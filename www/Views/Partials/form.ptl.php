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
                    <input
                        name="<?= $name ?>"
                        placeholder="<?= $inputVal["placeholder"] ?>"
                        class="<?= $inputVal["class"] ?>"
                        id="<?= $inputVal["placeholder"] ?>"
                        type="<?= $inputVal["type"] ?>"
                        <?= $inputVal["required"]?"required":"" ?>
                    >
                <?php endif;?>
             <?php endforeach;?>
        <?php endif;?>
        </div>
    <?php endforeach;?>
    <div id="div-register-submit-reset" class="div-form-50">
        <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">
        <input type="reset" value="<?= $config["config"]["reset"] ?>">
    </div>

</form>