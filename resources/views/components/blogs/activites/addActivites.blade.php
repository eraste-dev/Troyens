@isset(Request()->type)
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addActivities">
        <i class="fa fa-plus"></i>
        <span>Ajouter une nouvelle activité</span>
    </button>

    <div class="modal fade" id="addActivities" tabindex="-1" aria-labelledby="addActivities" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('admin.blogs.post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-body add-post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="validationCustom01">Titre:</label>
                                            <input class="form-control" type="text" required name="titre">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="d-block">Lieu:</label>
                                                    <input class="form-control" type="text" name="lieu">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="d-block">Date:</label>
                                                    <input class="form-control" type="date" name="date">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Image de présentation</label>
                                            <input class="form-control" type="file" name="media" />
                                        </div>

                                        <div class="email-wrapper">
                                            <div class="theme-form">
                                                <div class="form-group">
                                                    <label>Description (evenement, participants, etc ...):</label>
                                                    <textarea id="editor1" name="contenu" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group invisible">
                                        <input class="radio_animated" id="edo-ani" type="radio" name="media_type" checked
                                            value="{{ Request()->type }}">
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
@endisset
