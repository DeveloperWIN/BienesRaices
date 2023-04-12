<?php 

    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Guía para la decoración de tu hogar</h1>
        
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la Propiedad">
        </picture>
        <p class="informacion-meta">Escrito el: <span>04/04/2023</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita, similique corporis eveniet voluptate officia maiores 
               suscipit modi autem cumque inventore harum praesentium nam in impedit unde culpa? Maxime, voluptatibus iusto!
               suscipit modi autem cumque inventore harum praesentium nam in impedit unde culpa? Maxime, voluptatibus iusto!
               suscipit modi autem cumque inventore harum praesentium nam in impedit unde culpa? Maxime, voluptatibus iusto!
               suscipit modi autem cumque inventore harum praesentium nam in impedit unde culpa? Maxime, voluptatibus iusto!
               suscipit modi autem cumque inventore harum praesentium nam in impedit unde culpa? Maxime, voluptatibus iusto!</p>
        </div>
    </main>

<?php
    incluirTemplate('footer');
?>
