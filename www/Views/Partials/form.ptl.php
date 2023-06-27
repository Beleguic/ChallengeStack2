<?php if(!empty($errors)): ?>
<?php print_r($errors);?>
<?php endif;?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["divs"] as $name=>$configInput): ?>

        <div
            id="<?= $configInput["id"]?>"
            class="<?= $configInput["class"] ?>"
        >
        <?php if(isset($configInput['inside']) && sizeof($configInput['inside']) > 0): ?>
            <?php foreach ($configInput['inside'] as $name) : ?>
                <?php if(isset($config["inputs"][$name])) : ?>
                    <?php if(isset($config["inputs"][$name]['label'])) : ?>
                        <?php $labelVal = $config["inputs"][$name]['label']; ?>
                        <label
                            id="<?= $labelVal["id"]?>"
                            class="<?= $labelVal["class"] ?>"
                            for="<?= $labelVal["for"] ?>"
                        >
                        <?= $labelVal["value"] ?>
                        </label>
                    <?php endif;?>
                    <?php $inputVal = $config["inputs"][$name]; ?>
                    <?php if(isset($config["inputs"][$name]['balise'])): ?>
                        <?php if($config["inputs"][$name]['balise'] == "select"): ?>
                            <select
                                name="<?= $name ?>"
                                class="<?= $inputVal["class"] ?>"
                                id="<?= $inputVal["id"] ?>"
                            >
                            <?php foreach ($this->data[$config["inputs"][$name]['value']] as $types): ?>
                                <?php if($inputData[$name] == $types['value']): ?>
                                    <option value="<?= $types['value'] ?>" selected="selected"><?= $types['content'] ?></option>
                                <?php else:?>
                                    <option value="<?= $types['value'] ?>"><?= $types['content'] ?></option>
                                <?php endif;?>
                            <?php endforeach; ?>
                            </select>
                        <?php endif;?>
                    <?php else: ?>
                        <input
                            name="<?= $name ?>"
                            placeholder="<?= $inputVal["placeholder"] ?>"
                            class="<?= $inputVal["class"] ?>"
                            id="<?= $inputVal["id"] ?>"
                            type="<?= $inputVal["type"] ?>"
                            <?php   
                                if(!isset($inputData[$name])){
                                    if(!isset($inputVal['value'])){
                                        $value = "";
                                    }
                                    else{
                                        $value = $inputVal['value'];
                                    }
                                }
                                else{
                                    $value = $inputData[$name];
                                }
                            ?>
                            value="<?= $value ?>"
                            <?= $inputVal["required"]?"required":"" ?>
                        >
                    <?php endif;?>
                <?php endif;?>
             <?php endforeach;?>
        <?php endif;?>
        </div>
    <?php endforeach;?>
    <div id="div-register-submit-reset" class="div-form-50 d-flex justify-content-center">
        <?php foreach ($config["config"]["submit"] as $value): ?>
            <input type="submit" name="submit" value="<?= $value ?>">
        <?php endforeach; ?>
        <?php if(isset($config["config"]["reset"])):?>
            <input type="reset" value="<?= $config["config"]["reset"] ?>">
        <?php endif; ?>
    </div>

</form>