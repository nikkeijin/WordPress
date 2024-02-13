<!--

################################################## 

Hide empty field values from your template

-->

<!-- Basic Example 1 -->
<?php if (get_field('location')) the_field('location')?>

<!-- Basic Example 2 ->
<?php if(get_field('address')): ?>
    <div>
        <dt>Address</dt>
        <dd><?php the_field('address'); ?></dd>
    </div>
<?php endif; ?>

<!-- Loop Example -->
<?php $fields = get_field_objects(); ?>

<?php if($fields): ?>
    <ul>
        <?php foreach($fields as $field): ?>
            <?php if($field['value']): ?>
                <li><?php echo $field['label']; ?>: <?php echo $field['value']; ?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
