<?php
/* $dataContent - html iz baze
 * $inputName - vrednost za name atribut
 */
?>

<div class='d-flex mb-3' data-editor='quillEditor'>
    <div class='col-12'>
        <!-- Create the editor container -->
        <div data-editor='container' style='height: 300px'>
            <?php if (isset($dataContent)): ?>
                <?php echo $dataContent; ?>
            <?php endif; ?>
        </div>
    </div>
    <textarea name='<?php echo $inputName; ?>' style='display: none'
              data-editor='content'
    ><?php if (isset($dataContent)): ?>
            <?php echo $dataContent; ?>
        <?php endif; ?></textarea>
</div>
