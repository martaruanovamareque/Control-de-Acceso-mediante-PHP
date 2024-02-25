# Control de Acceso mediante PHP

En lo relativo al control de acceso:

      Crear una variable de sesión adicional llamada "permisos".
    
      Establecer dos niveles de permisos (Lectura) y (Lectura + Edición).
      
      Asignar a los dos usuarios de la base de datos un nivel diferente de permisos y su rol (usuario y administrador respectivamente).
      
      En función del usuario logeado (y por lo tanto su nivel de permisos) se ha de mostrar:
  
        LECTURA: Sólamente se verá la tabla de canciones/discos
      
        LECTURA + EDICIÓN; se verá la página completa con los formularios de edición
  
      Esquina superior derecha: Nombre de usuario + Rol + Cerrar Sesión.

En lo relativo a la validación de usuarios utilizando sesiones:

      · Extraer los valores de validación user/password(hash) de una BD mysql.
    
      · Formulario para introducir un nombre de usuario, con una longitud máxima de 40 carácteres y el password con no más de 20 carácteres.
    
      · Se comprobará (filtrado) si el nombre tiene carácteres no permitidos o tiene una longitud mayor al indicado.
    
      · El valor introducido debe ser guardado en la variable de sesión bajo el índice "nome" si se valida, sino mostrar erro y login de nuevo.
    
      · Se hará un registro en archivo (log) de qué usuario se logeo y cuando, así como cierre do su cierre de sesión.
    
      · Tiene que existir una “área reservada a usuarios logeados” y un mecanismo de cierre de sesión. En ambos casos tiene que mostrarse en la página información relevante sobre la sesión.

En relativo a la base de datos:

      Se creará una tabla disco en la base de datos para guardar canciones: titulo (clave primaria), grupo,
    disco, ano, duración.
    
    La página se hará para gestionar esa tabla vía web: podremos eliminar, modificar (opcional), insertar y añadir registros en la tabla anterior. Se añade pues a la página varios botones, para hacer todas estas tareas:
  
        • Añadir disco.
        
        • Eliminar el disco seleccionado.
        
        • Modificar registro seleccionado.
  
    Añadir un campo “Seleccionado” a la tabla anterior en el que se tenga un radiobutton o button por cada disco (todos tedrán el mismo name, y un value diferente). Cuando se intente eliminar el disco seleccionado se borrará de la tabla el registro que está seleccionado, si se elige modificar modificaremos ese registro.
    
    Despues de premer eliminar deberá salír una página con un aviso: “Está seguro? O rexistro
    seleccionado serán eliminado”, y dos botones “Confirmar”, “Cancelar”.
    
    Los dos botones añadir y modificar, deberán abrir un formulario en el que se tengan etiquetas y
    cajas de texto para todos los campos de la tabla.

Se adjuntaran capturas de demostración.
