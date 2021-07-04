<?php

spl_autoload_register(
	function ($className) {
		$aDiretorios = ["backend", "frontend"];
		$aSubDiretorios = ["database", "models", "controllers", "view"];

		$root = "/var/www/html/cursoPhp/src/";

		$iBase = "/var/www/html/cursoPhp/src/backend/core/controller/IBaseController.php";
		$iBase = "/var/www/html/cursoPhp/src/backend/core/controller/IBaseModel.php";
		if (file_exists($iBase)) {
			require_once $iBase;
		}

		foreach ($aDiretorios as $dir) {
			$fullPath = $root . $dir . "/"; // ...src/backend/

			$carregou = false;

			foreach ($aSubDiretorios as $currentDir) {
				$dirLoad = $fullPath . $currentDir . "/"; // ...backend/Models

				if (file_exists($dirLoad . "$className.php")) {
					require_once $dirLoad . "$className.php"; // ...Models/TarefasModel.php
					$carregou = true;
					break; // "/var/www/html/cursoPhp/src/backend/Models/TarefasModel.php"
				}
			}

			if ($carregou) {
				break;
			}
		}
	}
);
