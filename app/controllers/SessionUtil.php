<?php 

	class SessionUtil {

		public static function isLoggedIn() {
			return Session::has('id');
		}

	}

?>