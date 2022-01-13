<button class="btn btn-primary" type="button" data-bs-toggle="modal"
    data-bs-target="{{ '#updateActivities' . $item->id }}">
    <i class="fa fa-edit"></i>
</button>

<div class="modal fade" id="{{ 'updateActivities' . $item->id }}"" tabindex=" -1"
    aria-labelledby="{{ 'updateActivities' . $item->id }}"" style=" display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.blogs.post') . '?post_id=' . $item->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-body add-post">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="validationCustom01">Titre:</label>
                                        <input class="form-control" type="text" required name="titre"
                                            value="{{ $item->titre }}">
                                    </div>

                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="d-block">Lieu:</label>
                                                <input class="form-control" type="text" name="lieu"
                                                    value="{{ $item->lieu }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="d-block">Date:</label>
                                                <input class="form-control" type="date" name="date"
                                                    value="{{ $item->date }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="email-wrapper">
                                        <div class="theme-form">
                                            <div class="form-group">
                                                <label>Description (evenement, participants, etc ...):</label>
                                                <textarea id="editor1" name="contenu"
                                                    rows="10"> value="{{ $item->contenu }}"</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input class="form-control" type="file" name="media" />
                                </div>

                                <div class="form-group invisble">
                                    <label>Type:</label>
                                    <div class="m-checkbox-inline">
                                        <label class="f-w-500" for="edo-ani">
                                            <input class="radio_animated" id="edo-ani" type="radio" name="media_type"
                                                checked value="activities">
                                            Article
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">
                        Fermer
                    </button>
                    <button class="btn btn-primary" type="submit" title="">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
