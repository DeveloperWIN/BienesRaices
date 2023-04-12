<?php 

    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en Venta Frente al Bosque</h1>
        <picture>
            <source srcset="build/img/destacada.webp" type="image/webp">
            <source srcset="build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen de la Propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p>4</p>
                </li>
            </ul>
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
