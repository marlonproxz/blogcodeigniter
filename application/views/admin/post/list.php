<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Imagen</th>
            <th>Publicado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($posts as $key => $p) :?>
        <tr>
            <td><?php echo $p->post_id; ?></td>
            <td><?php echo word_limiter($p->title, 4) ?></td>
            <td><?php echo word_limiter($p->description, 4) ?></td>
            <td><?php echo format_date($p->created_at) ?></td>
            <td><?php echo $p->image != "" ? '<img class="img-thumbnail img-presentation-small" src="'. base_url().'uploads/post/'. $p->image . '">' : "" ?></td>
            <td><?php echo $p->posted; ?></td>
            <td>
                <a class="btn btn-sm btn-primary" 
                   href="<?php echo base_url(). "admin/post_save/". $p->post_id ?>">
                    <i class="fa fa-pencil"></i> Editar</a>
                    <br>
                <a class="btn btn-sm btn-danger" 
                   href="#"
                   data-id="<?php echo $p->post_id ?>">
                    <i class="fa fa-remove"></i> Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </tbody>
</table>
