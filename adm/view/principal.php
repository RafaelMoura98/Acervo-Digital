<div id="main">
    <div id="info_PI">
    
        <h3>Cursos</h3>
        <?php
                foreach (Cursos::consultarCursos() as $curso):
        ?>
            <div class="center">
                <input type="radio" name="curso">
                <label for=""><?= $curso['curso']?></label>
            </div>
        <?php endforeach?>
    
        <h3>Ano de publicação</h3>
    
        <div class="center">
            <input type="radio" name="ano">
            <label for="">2022</label>
        </div>
    
        <div class="center">
            <input type="radio" name="ano">
            <label for="">2023</label>
        </div>
    
        <div class="center">
            <input class="input_filtro" type="radio" name="ano">
            <label class="label_filtro" for="">2024</label>
        </div>
    </div>
    <div id="content">
            <div id="content_PI">
                <div class="show_PI">
                    <div id="titulo_PI">
                    <h3>Título</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda, unde cupiditate perspiciatis voluptates nesciunt cumque. Molestias ipsam aut, error consectetur aliquam ullam similique ea autem tenetur, corrupti rerum id?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque velit inventore perspiciatis earum a nihil, provident exercitationem vitae laudantium, magni maxime dignissimos error assumenda recusandae quisquam laboriosam obcaecati. Iusto, ipsum?</p>
                    </div>
                    <div id="button_PI">
                        <button>BAIXAR</button>
                        <button>VER ONLINE</button>
                    </div>
                </div>
                <div class="show_PI">
                    <div id="titulo_PI">
                    <h3>Título</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda, unde cupiditate perspiciatis voluptates nesciunt cumque. Molestias ipsam aut, error consectetur aliquam ullam similique ea autem tenetur, corrupti rerum id?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque velit inventore perspiciatis earum a nihil, provident exercitationem vitae laudantium, magni maxime dignissimos error assumenda recusandae quisquam laboriosam obcaecati. Iusto, ipsum?</p>
                    </div>
                    <div id="button_PI">
                        <button>BAIXAR</button>
                        <button>VER ONLINE</button>
                    </div>
                </div>
    
                <div class="show_PI">
                    <div id="titulo_PI">
                    <h3>Título</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet assumenda, unde cupiditate perspiciatis voluptates nesciunt cumque. Molestias ipsam aut, error consectetur aliquam ullam similique ea autem tenetur, corrupti rerum id?Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque velit inventore perspiciatis earum a nihil, provident exercitationem vitae laudantium, magni maxime dignissimos error assumenda recusandae quisquam laboriosam obcaecati. Iusto, ipsum?</p>
                    </div>
                    <div id="button_PI">
                        <button>BAIXAR</button>
                        <button>VER ONLINE</button>
                    </div>
            </div>
    </div>
</div>
</body>
</html>