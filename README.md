# Sistema de Reserva de Estacionamiento AQPark
Todo el contenido del sistema se subira aqui y cada uno debe crear una rama (branch) para hacer las modificaciones que tengan que hacer<br>

Recordemos que el repositorio tiene una instancia principal se llama " master " y cada branch debe tener su nombre <br>

**Las instrucciones básicas para usar git son:<br>**

1. Clonar el repositorio para tener una copia local:<br>
   ` $git clone https://github.com/mxcat1/AQPark`<br>
2. Para actualizar la copia local para que este igual al master<br>
   ` $git pull origin master`<br>
3. Crear una rama o branch <br>
   `$ git branch tunombre`<br>
4. Cambiarse a la rama que crearon<br>
   `$ git checkout tunombre`<br>
5. Para comprobar que van a  subir solo los archivos que modificaron <br>
    - utilizar el comando:<br>
      `$ git status`<br>
6. Subir sus cambios a su rama<br>
    - Agregar los archivos<br>
      `$ git add .`<br>
    - Crear el commit con la descripción de lo que modificaron o avanzaron tienen que ser claros<br>
      `$ git commit -m "descripcion de lo que hice o modifique "`<br>
    - enviar todos los cambios<br>
      `$ git push origin nombre_de_tu_rama`<br>
    - 
**Las instrucciones básicas para usar Laravel:<br>**
    
1. Copiar todo el contenido de la Carpeta AQPark en la carpeta www de tu 
servidor en el caso es Laragon, en el caso de XAMP copiar en la carpeta htdocs, y en el caso de wamp en la carpeta principal de paginas web.
2. Instalar composer
3. una vez se encuentren en la carpeta donde esta el proyecto abrir una terminal
4. en la terminal abierta, se tienen que ubicar en el archivo AQPark utilizar los comandos dir para verificar las carpetas
5. utilizar el comando cd en la carpeta apra dirigirse ala carpeta AQPark
6. una vez ubicado en la carpeta AQPark en la consola de comandos Toca Configurar
7. Con un editor de texto o Visual Code abrir el archivo .env
8. Editar los siguientes parametros :
   - DB_CONNECTION=mysql
   - DB_HOST=127.0.0.1
   - DB_PORT=3306
   - DB_DATABASE=aqparking -------> crear la base de datos con este nombre
   - DB_USERNAME=root
   - DB_PASSWORD=XXmxcatXX -----> cambiar este por la contraseña de su servidor de base de datos
9. Si utilizan los host virtuales http://AQPark.test deben de crear este host virtual en su servidor
10. en el caso no utilicen host virtuales cambiar esto APP_URL=http://AQPark.test por APP_URL=http://localhost/AQPark/public/
11. una vez terminado esa configuracion ubicarse denuevo en la terminal antes abierta y digitar el comando: composer install
12. ejecutar el comando php artisan migrate:fresh --seed
13. si ese comando no funciona ejecutar el comando php artisan migrate y insertar un usuario como administrador de sistema manuelmente en la base de datos
14. Eso seria todo.
