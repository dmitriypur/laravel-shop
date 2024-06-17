<?php foreach ($this->groups as $group_id => $group): ?>
    <?php if ($group['active']): ?>
        <div class="shop-sidebar-size">
            <h4 class="sidebar-title"><?= $group['title'] ?></h4>
            <div class="sidebar-size">
                <?php if (isset($this->attrs[$group_id])): ?>
                    <?php foreach ($this->attrs[$group_id] as $attr_id => $item): ?>
                        <?php
                        if (!empty($filter) && in_array($attr_id, $filter)) {
                            $checked = ' checked';
                        } else {
                            $checked = null;
                        }
                        ?>
                        <div class="checkbox__box">
                            <input class="form-check-input" data-alias="<?= $group['alias'] ?>" data-inp="<?= $group['type_inp'] ?>" type="checkbox"
                                   value="<?= $attr_id ?>"
                                   id="size-<?= $attr_id ?>" <?= $checked ?>>
                            <label class="form-check-label" for="size-<?= $attr_id ?>">
                                <?= $item ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>
