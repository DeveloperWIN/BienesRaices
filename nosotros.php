<?php 

    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>
            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste aliquid repellendus fugiat magnam odit molestias itaque. 
                    Modi ipsa deserunt consequatur, explicabo exercitationem voluptates pariatur magnam possimus reprehenderit. Amet, neque ut?
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iste aliquid repellendus fugiat magnam odit molestias itaque. 
                    Modi ipsa deserunt consequatur, explicabo exercitationem voluptates pariatur magnam possimus reprehenderit. Amet, neque ut?
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono Seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur mollitia dolor autem cupiditate molestias 
                   tempore odit, dolores, consectetur blanditiis ipsum molestiae officiis quia. Ipsum veniam earum recusandae
                   quidem similique nobis?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur mollitia dolor autem cupiditate molestias 
                   tempore odit, dolores, consectetur blanditiis ipsum molestiae officiis quia. Ipsum veniam earum recusandae
                   quidem similique nobis?</p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur mollitia dolor autem cupiditate molestias 
                   tempore odit, dolores, consectetur blanditiis ipsum molestiae officiis quia. Ipsum veniam earum recusandae
                   quidem similique nobis?</p>
            </div>
        </div>
    </section>

<?php
    incluirTemplate('footer');
?>
