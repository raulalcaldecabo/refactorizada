<div class="container">
    <?php
    echo "<h2> Listado de profesores </h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>DNI</th>";
    echo "<th>Nombre</th>";
    echo "<th>Apelido</th>";
    echo "<th>Título</th>";
    echo "<th>correo</th>";
    echo "<th>Foto</th>";
    echo "<th>Mod. profesor</th>";
    echo "<th>Mod. foto</th>";
    echo "<th>Mod. estado</th>";
    echo "</tr>";
    foreach($array as $data) {
        echo "<tr>";
        foreach($data as $field_name => $value) {
            if($field_name == "pfoto") {
                echo "<td><img width='50' height = '50' src=$value></img></td>";
            }
            else {
                if($value!=$data['activo']){
                    echo "<td>$value</td>";
                }
            }
            
        }
        echo "<td><a href= 'index.php?controller=profesor&action=getProfEdit&id=".$data['ID']."&dni=".$data['dni']."&nombre=".$data['nombre']."&apellido=".$data['apellido']."&titulo=".$data['titulo']."&mail=".$data['mail']."'> <img src='views/imagen/lapiz.png' width='60'> </a></td>";
        echo "<td><a href= 'index.php?controller=profesor&action=getEditImgForm&id=".$data['ID']."'> <img src='imagen/camara.png' width='60'> </a></td>";
        if($data['activo']=='a'){
            echo "<td><a href= 'index.php?controller=profesor&action=Desactivate&ID=".$data['ID']."'><img src='imagen/on.png' width='60'></a></td>";
        }else if($data['activo']=='d'){
            echo "<td><a href= 'index.php?controller=profesor&action=Activate&ID=".$data['ID']."'> <img src='imagen/off.png' width='60'> </a></td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>

</div>