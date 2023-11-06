<?php
class Autocargador {
  public static function autocargar() {
      spl_autoload_register([__CLASS__, 'autocarga']);
  }

  private static function autocarga($clase) {
      $ruta = __DIR__ . '/' . $clase . '.php'; 

      if (file_exists($ruta)) {
          include $ruta;
      } elseif ($clase === 'Usuario') {
          $rutaUsuario = __DIR__ . '/Clases/usuario.php';
          if (file_exists($rutaUsuario)) {
              include $rutaUsuario;
          }
      } elseif ($clase === 'GBD') {
          $rutaUsuario = __DIR__ . '/helper/GBD.php';
          if (file_exists($rutaUsuario)) {
              include $rutaUsuario;
          }
      } elseif ($clase === 'Login') {
          $rutaUsuario = __DIR__ . '/helper/login.php';
          if (file_exists($rutaUsuario)) {
              include $rutaUsuario;
          }
      } elseif ($clase === 'Register') {
          $rutaUsuario = __DIR__ . '/helper/register.php';
          if (file_exists($rutaUsuario)) {
              include $rutaUsuario;
          }
      } elseif ($clase === 'Sesion') {
          $rutaUsuario = __DIR__ . '/helper/sesion.php';
          if (file_exists($rutaUsuario)) {
              include $rutaUsuario;
          }
      }
  }
}