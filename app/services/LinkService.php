<?php


namespace Services;

use Models\Link;

class LinkService
{
	protected static $checkUrlExists = true;

	/**
	 * @param string $url
	 * @return bool|string
	 * @throws \Exception
	 */
	public function urlToShortCode($url, $exp_at)
	{
		if (empty($url)) {
			throw new \Exception("Не получен адрес URL.");
		}

		if ($this->validateUrlFormat($url) == false) {

			throw new \Exception("Адрес URL имеет неправильный формат.");

		}

		if (self::$checkUrlExists) {
			if (!$this->verifyUrlExists($url)) {
				throw new \Exception("Адрес URL не существует.");
			}
		}

		$shortURL = $this->urlExistsInDb($url);

		if ($shortURL == false) {
			$shortURL = $this->generateUniqueShortURL();
			$this->insertUrlInDb($url, $shortURL, $exp_at);
		}
		return $shortURL;
	}

	/**
	 * @param string $url
	 * @return mixed
	 */
	protected function validateUrlFormat($url)
	{
		return filter_var($url, FILTER_VALIDATE_URL);
	}

	/**
	 * @param string $url
	 * @return bool
	 */
	protected function verifyUrlExists($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		$response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		return (!empty($response) && $response != 404);
	}

	/**
	 * @param string $url
	 * @return bool
	 */
	protected function urlExistsInDb($url)
	{
		$result = Link::where('long_url', $url)->get()->first();
		return (empty($result)) ? false : $result["short_code"];
	}

	/**
	 * @param $long_url
	 * @param $short_url
	 * @param $exp_at
	 * @return mixed
	 */
	protected function insertUrlInDb($long_url, $short_url, $exp_at)
	{
		return Link::create([
			'long_url'  => $long_url,
			'short_url' => $short_url,
			'exp_at'    => date("Y-m-d H:i", strtotime($exp_at)),
		]);
	}

	/**
	 * @return false|string
	 */
	protected function generateUniqueShortURL()
	{
		$token = substr(md5(uniqid(rand(), true)), 0, 6);
		$result = Link::where('short_url', $token)->get()->first();
		if (!empty($result)) {
			$this->generateUniqueShortURL();
		} else {
			return $token;
		}
	}
}