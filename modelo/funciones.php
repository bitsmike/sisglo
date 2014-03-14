<?
	function get_post_data() {
		$hash = "";
		if(isset($_POST['user']) && isset($_POST['pass'])) {
			$hash=$_POST['user'].$_POST['pass'];
		}
		return $hash;
	}

	function login() {
		$user_valido = validar_user_y_pass();
		if($user_valido) {
			$_SESSION['login_date'] = time();
		}
		goto_page("modelo/inicio.php");
	}

	function validar_user_y_pass() {
		$user_hash = get_post_data();
		$system_hash = bitsmike123;
		if($user_hash == $system_hash) {
			return True;
		}
	}

	//destruir sesion
	function logout() {
		unset($_SESSION);
		$datos_cookie = session_get_cookie_params();
		setcookie(session_name(), NULL, time()-999999, $datos_cookie["path"],
		$datos_cookie["domain"], $datos_cookie["secure"],
		$datos_cookie["httponly"]);
		goto_page("index.php");
	}


	/*
	Primero verifico que la variable de sesión login_date, existe. De ser
	así, obtengo su valor y lo retorno.
	Si no existe, retornará el entero 0
	*/
	function obtener_ultimo_acceso() {
		$ultimo_acceso = 0;
		if(isset($_SESSION['login_date'])) {
		$ultimo_acceso = $_SESSION['login_date'];
		}
		return $ultimo_acceso;
	}


	/*
	Esta función, retornará el estado de la sesión:
	sesión inactiva, retornará False mientras que sesión activa,
	retornará True.
	Al mismo tiempo, se encarga de actualizar la variable de sesión
	login_date, cuando la sesión se encuentre activa
	*/
	function sesion_activa() {
		$estado_activo = False;
		$ultimo_acceso = obtener_ultimo_acceso();
		/*
		Establezco como límite máximo de inactividad (para mantener la
		sesión activa), media hora (o sea, 1800 segundos).
		De esta manera, sumando 1800 segundos a login_date, estoy definiendo
		cual es la marca de tiempo más alta, que puedo permitir al
		usuario para mantenerle su sesión activa.
		*/
		$limite_ultimo_acceso = $ultimo_acceso + 1800;
		/*
		Aquí realizo la comparación. Si el último acceso del usuario,
		más media hora de gracia que le otorgo para mantenerle activa
		la sesión, es mayor a la marca de hora actual, significa entonces
		que su sesión puede seguir activa. Entonces, le actualizo la marca
		de tiempo, renovándole la sesión
		*/
		if($limite_ultimo_acceso > time()) {
			$estado_activo = True;
			# actualizo la marca de tiempo renovando la sesión
			$_SESSION['login_date'] = time();
		}
		return $estado_activo;
	}

	# Verificar sesión
	function validar_sesion() {
		if(!sesion_activa()) {
			logout();
		}
	}

	# redirigir al usuario
	function goto_page($pagina) {
		header("Location:$pagina");
	}
?>