{include file="header.tpl"}
<!-- Div principal -->
    <div id="div_principal" class="container">
    
        <h3 class="mx-5 my-4">{$titulo_s}</h3>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Veterinaria</th>
                </tr>
            <thead>
            <tbody>

                {foreach from=$veterinarios item=veterinario}
                    <tr>
                        <td>{$veterinario->nombre}</td>
                        <td>{$veterinario->apellido}</td>
                        <td>{$veterinario->especialidad}</td>
                        <td>{$veterinario->veterinaria}</td>
                    </tr>
                {/foreach}
            
            </tbody>    
        </table>
 
    </div>
    <!-- Fin Div principal -->

{include file="footer.tpl"}
