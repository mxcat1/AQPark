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
