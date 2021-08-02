
{if $usser eq true && $usser.USSER_ROLE == 1}
    {include file="header_admin.tpl"}
{else}
    {include file="header.tpl"} 
{/if}

<div class="container">
    <div class="wrapperProduct">
        <h1 class="hProduct">{$producto->nombre|upper}</h1>
        <p class="pProduct">{$producto->descripcion}</p>
        <h2>${$producto->precio}</h2>
    </div>
    <figure class="figProduct">
        <img src="{$producto->imagen}" alt="{$producto->nombre}" class="imgProduct">
    </figure>
</div>
{if $usser eq true && $usser.USSER_ROLE == 1}
    <div class="container">
        <h2> <a class="black" href="edit/{$producto->id}"> Editar este producto </a> </h2>
    </div>
{/if}

<div class="col-lg-50">
        <div class="col-md-50">
        <div class="row justify-content-center">
            
            <div class="py-5 offset-1 col-lg-10">
            
            {if $usser eq true}
         
                    <form method="POST" id="comment-form">
                        <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                            <span> Dejanos tu comentario</span>
                            <textarea  class="form-control" rows="3" cols="50" name="input_text" id="input_text" ></textarea>
                        </div>

                        <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                            <h6> Valoracion </h6>

                            <select class="ranking" id="js-ranking"> <label for="js-ranking"> Calificaciones</label>
                                <option type="radio" name="ranking" value="5"  class="fas fa-star">5</option>
                                <option type="radio" name="ranking" value="4"  class="fas fa-star">4</option>
                                <option type="radio" name="ranking" value="3"  class="fas fa-star">3</option>
                                <option type="radio" name="ranking" value="2"  class="fas fa-star">2</option>
                                <option type="radio" name="ranking" value="1"  class="fas fa-star">1</option>
                            </select>
                        
                        </div>
                        <input type="hidden" class="form-control" id="js-input-hidden-email" name="usser-name" value="{$usser['USSER_EMAIL']}">
                        <input type="hidden" class="form-control" id="js-input-hidden-id" name="usser-id" value="{$usser['USSER_ID']}">
                        <input type="hidden" class="form-control" id="js-data-id-producto" name="data-id-producto" value="{$producto->id}">
                    </form>
                    <div class="text-center col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                        <button id="comment-button" class="btn btn-check">Agregar</button>
                    </div>
                </div>

                <div class="row justify-content-center">
                        <div class="col-md-8" id="vue_container" usser="{$usser['USSER_ROLE']}" data-id-producto="{$producto->id}">
            {else}
                    <div class="col-md-8" id="vue_container" usser ="2" data-id-producto="{$producto->id}">
                        <input type="hidden" class="form-control" id="js-input-hidden-email" name="usser-name" value="unknown">
                        <input type="hidden" class="form-control" id="js-input-hidden-id" name="usser-id" value="0">
                        <input type="hidden" class="form-control" id="js-data-id-producto" name="data-id-producto" value="{$producto->id}">
                        <input type="hidden" class="form-control" id="js-ranking" name="js-ranking" value="0">
            {/if}
                        {include file="./vue/comentarios.vue"}
                     </div>
            </div>
        </div>
    </div>
    
    <script src="./js/javascript.js"></script>
{include file="footer.tpl"}