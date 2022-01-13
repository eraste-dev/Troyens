<button class="btn btn-primary" type="button" data-bs-toggle="modal"
    data-bs-target="{{ '#updatePartenaire' . $item->id }}">
    <i class="fa fa-edit"></i>
</button>

<div class="modal fade" id="{{ 'updatePartenaire' . $item->id }}" tabindex="-1" aria-labelledby="updatePartenaire"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.partenaires.save') . '?partenaire_id=' . $item->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="raisonSocial">Dénomination:</label>
                                <input class="form-control" id="raisonSocial" type="text" required name="raisonSocial"
                                    value="{{ $item->raisonSocial }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" id="email" type="text" name="email"
                                    value="{{ $item->email }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone:</label>
                                <input class="form-control" id="telephone" type="text" name="telephone"
                                    value="{{ $item->telephone }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site_web">Site internet:</label>
                                <input class="form-control" id="site_web" type="text" name="site_web"
                                    value="{{ $item->site_web }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="siege">Siège:</label>
                                <input class="form-control" id="siege" type="text" name="siege"
                                    value="{{ $item->siege }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="avatar">Logo:</label>
                                <input class="form-control" id="avatar" type="file" name="avatar">
                            </div>
                        </div>


                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-bs-original-title=""
                        title="">
                        Fermer
                    </button>
                    <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
