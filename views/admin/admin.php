<h2>Administrador</h2>
<form class = "formulario" action="administrador.php" method="POST"  name="dades">
    <table>
        <tr>
            <td>email</td> 
            <td>
                <input type="text" name="usuario" size="50" maxlength="15"><br/>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" size="50" maxlength="9">
            </td>
        </tr>
    </table>
    <br/>
    <div class="pie">
        <input type="submit" name="entrar" value="Entrar">
        <input type="reset" value="borrar">
    </div>                   
</form>
