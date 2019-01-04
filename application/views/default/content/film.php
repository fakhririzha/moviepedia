<div class="section">
    <br><br>
    <div class="row">
        <div class="col s12">
            <?php //foreach ($result['results']['bindings'] as $data):?>
            <div class="card grey lighten-2 z-depth-3">
                <div class="card-content">
                    <h4><a href="<?= base_url('film/' . $data['wikiPageID']['value']) ?>"
                            class="green-text text-accent-4"><?= $data['namafilm']['value'] ?></a></h4>
                    <div class="divider grey"></div>
                    <p><em>Running Time: <?= intval($data['durasi']['value']) ?>
                            minutes</em></p>
                    <div class="divider grey"></div>
                    <br>
                    <div class="row">
                        <div class="col s3">
                            <img src="<?= $poster ?>" alt="<?= $poster ?>"
                                class="responsive-img">
                        </div>
                        <div class="col s9">
                            <table class="responsive-table">
                                <tr>
                                    <th>Title</th>
                                    <td><?= $data['namafilm']['value'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Director</th>
                                    <td><a href="<?= $data['directorID']['value'] ?>"
                                            target="_blank"><?= $data['director']['value'] ?></a></td>
                                </tr>
                                <tr>
                                    <th>Producer</th>
                                    <td><a href="<?= $data['producerID']['value'] ?>"
                                            target="_blank"><?= $data['producer']['value'] ?></a></td>
                                </tr>
                                <tr>
                                    <th>Starring</th>
                                    <td>
                                        <ul>
                                            <?php foreach ($starring as $star): ?>
                                            <li><a href="<?= $star['starringWikiPageID']['value'] ?>"
                                                    target="_blank"><?= $star['starring']['value'] ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td><?= $data['country']['value'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Language</th>
                                    <td><?= $data['language']['value'] ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Homepage</th>
                                    <td><a href="<?= $data['homepage']['value'] ?>"
                                            class="btn-small" target="_blank">Click</a></td>
                                </tr>
                                <tr>
                                    <th>WikiPedia Link</th>
                                    <td><a href="<?= $data['primaryTopic']['value'] ?>"
                                            class="btn-small" target="_blank">Click</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php //endforeach;?>
        </div>
    </div>
</div>
