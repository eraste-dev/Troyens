<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addPartenaire">
    <i class="fa fa-plus"></i>
    <span>nouveau article</span>
</button>


<div class="modal fade" id="addPartenaire" tabindex="-1" aria-labelledby="addPartenaire" style="display: none;"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.partenaires.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="raisonSocial">Dénomination:</label>
                                <input class="form-control" id="raisonSocial" type="text" required name="raisonSocial"
                                    value="{{ old('raisonSocial') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input class="form-control" id="email" type="text" name="email"
                                    value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="telephone">Téléphone:</label>
                                <input class="form-control" id="telephone" type="text" name="telephone"
                                    value="{{ old('telephone') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="site_web">Site internet:</label>
                                <input class="form-control" id="site_web" type="text" name="site_web"
                                    value="{{ old('site_web') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="siege">Siège:</label>
                                <input class="form-control" id="siege" type="text" name="siege"
                                    value="{{ old('siege') }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="avatar">Logo:</label>
                                <input class="form-control" id="avatar" type="file" name="avatar">
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <input class="form-control invisible" type="text" name="role" value="partenaire">
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
