<div class="card card-primary card-outline card-tabs product-filter">
    <div class="card-header p-0 pt-1 border-bottom-0">
        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
            <?php $i = 1;
            foreach ($this->groups as $group_id => $group): ?>
                <li class="nav-item">
                    <a class="nav-link<?php if ($i == 1) echo ' active' ?>" id="custom-tabs-three-<?= $group_id; ?>-tab"
                       data-toggle="pill"
                       href="#custom-tabs-three-<?= $group_id; ?>" role="tab"
                       aria-controls="custom-tabs-three-<?= $group_id; ?>" aria-selected="false"><?= $group['title']; ?></a>
                </li>
                <?php $i++; endforeach; ?>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="custom-tabs-three-tabContent">
            <?php $i = 1;
            foreach ($this->groups as $group_id => $group):
                ?>
                <div class="tab-pane fade <?php if ($i == 1) echo ' active show' ?>"
                     id="custom-tabs-three-<?= $group_id; ?>" role="tabpanel"
                     aria-labelledby="custom-tabs-three-<?= $group_id; ?>-tab">
                    <?php foreach ($this->attrs[$group_id] as $attr_id => $value): ?>
                        <?php
                        if (!empty($this->filter) && in_array($attr_id, $this->filter)) {
                            $checked = ' checked';
                        } else {
                            $checked = null;
                        }
                        ?>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <?php if($group['type_inp'] == 1): ?>
                                        <input class="form-check-input" type="radio" name="attrs[<?= $group_id ?>]"
                                               value="<?= $attr_id; ?>"<?=$checked?>>
                                    <?php else: ?>
                                        <input class="form-check-input" type="checkbox" name="attrs[<?= $group_id ?>][]"
                                               value="<?= $attr_id; ?>"<?=$checked?>>
                                    <?php endif; ?>

                                    <?= $value; ?></label>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php $i++; endforeach; ?>
            <button type="button" id="reset-filter" class="btn btn-danger">Сбросить</button>
        </div>
    </div>
</div>