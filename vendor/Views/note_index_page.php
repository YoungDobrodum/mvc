<div>
    <!--TODO routing-->
    <a href="<?= Route::url('note', 'create')?>">Create</a>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>note</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!empty($notes)):?>
                <?php foreach($notes as $note):?>
                <tr>
                    <td><?= $note['id']?></td>
                    <td><?= $note['text']?></td>
                    <td>
                        <form action="<?= Route::url('note','destroy')?>" method="post">
                            <input type="hidden" name="index" value="<?= $note['id']?>"/>
                            <input type="submit" value="Delete">
                        </form>
                        <form action="<?= Route::url('note', 'edit')?>" method="post">
                            <input type="hidden" name="index" value="<?= $note['id']?>"/>
                            <input type="hidden" name="note" value="<?= $note['text']?>"/>
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                </tr>
                <?php endforeach;?>
            <?php endif;?>
        </tbody>
    </table>
</div>
