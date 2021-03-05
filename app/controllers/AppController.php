<?php


namespace Controllers;


class AppController
{
	/**
	 * @param string|null $template
	 * @param mixed|null ...$parametrs
	 */
	protected function render(string $template = null,$params )
	{
		$templatePath = 'views/'.$template.'.php';
		$output = "File not found";

		if (file_exists($templatePath))
		{
			ob_start();
			include_once $templatePath;
			$output = ob_get_clean();
		}

		print $output;
	}
}