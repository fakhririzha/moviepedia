<div class="section">
    <br><br>
    <div class="row grey lighten-2">
        <div class="col s8">
            <div class="row">
                <?php foreach ($result['results']['bindings'] as $data): ?>
                <div class="col s12">
                    <div class="card green accent-4">
                        <div class="card-content white-text">
                            <span class="card-title"><a href="<?= base_url('film/' . $data['wikiPageID']['value']) ?>"
                                    class="white-text"><?= $data['namafilm']['value'] ?></a></span>
                            <div class="divider"></div>
                            <br>
                            <?php if ($data['abstract']['value'] == ''): ?>
                            <p>No description yet.</p>
                            <?php else: ?>
                            <p><?= substr($data['abstract']['value'], 0, 350) . '...' ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <div class="card-action">
                            <a class="waves-effect waves-light btn-small orange" href="<?= base_url('film/' . $data['wikiPageID']['value']) ?>">
                                <i class="material-icons left">open_in_new</i>Read More
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col s4">
            <form action="<?= base_url('search') ?>"
                method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input placeholder="Enter a keyword..." name="keyword" type="text" class="validate">
                        <!-- <label for="keyword">Enter a keyword</label> -->
                    </div>
                </div>
                <div class="row">
                    <button type="submit" name="search" value="search" class="btn-small btn-large waves-effect waves-light green accent-4"><i
                            class="material-icons right">search</i>Explore
                        now.</button>
                </div>
            </form>
        </div>
    </div>
</div>
