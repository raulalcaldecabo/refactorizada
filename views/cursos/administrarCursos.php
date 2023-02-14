<div class="container">
    <?php
    echo "<h2> Cursos BDN </h2>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Duración</th>";
    echo "<th>Inicio</th>";
    echo "<th>Final</th>";
    echo "<th>Profesor</th>";
    echo "<th>Foto</th>";
    echo "<th>Mod. curso</th>";
    echo "<th>Mod. foto</th>";
    echo "<th>Mod. estado</th>";
    echo "</tr>";
    foreach($array as $data) {
        echo "<tr>";
        foreach($data as $field_name => $value) {
            if($field_name == "cfoto") {
                echo "<td><img width='50' height = '50' src=$value></img></td>";
            }
            else {
                if($value!=$data['activo']){
                    echo "<td>$value</td>";
                }
            }
            
        }
        echo "<td><a href= 'index.php?controller=curso&action=getCursoEdit&ID=".$data['ID']."&nombre=".$data['nombre']."&descripcion=".$data['descripcion']."&duracion=".$data['duracion']."&inicio=".$data['inicio']."&final=".$data['final']."&profesor=".$data['profesor']."'> <img src='views/imagen/lapiz.png' width='60'> </a></td>";
        echo "<td><a href= 'index.php?controller=curso&action=getEditImgForm&ID=".$data['ID']."'> <img src='imagen/camara.png' width='60'> </a></td>";
        if($data['activo']=='a'){
            echo "<td><a href= 'index.php?controller=curso&action=Desactivate&ID=".$data['ID']."'><img src='imagen/on.png' width='60'></a></td>"; 
        }else if($data['activo']=='d'){
            echo "<td><a href= 'index.php?controller=curso&action=Activate&ID=".$data['ID']."'> <img src='imagen/off.png' width='60'> </a></td>"; 
        }
        echo "</tr>";
    }
    echo "</table>";

    ?>

</div>
