<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#{{ 'editBlog' . $item->id }}">
    <i class="fa fa-edit"></i>
</button>


<div class="modal fade" id="{{ 'editBlog' . $item->id }}" tabindex="-1"
    aria-labelledby="{{ 'editBlog' . $item->id }}" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.blogs.post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"
                        data-bs-original-title="" title="">
                    </button>
                </div>

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

                                    <div class="form-group">
                                        <label>Type:</label>
                                        <div class="m-checkbox-inline">
                                            <label class="f-w-500" for="edo-ani">
                                                <input class="radio_animated" id="edo-ani" type="radio"
                                                    name="media_type"
                                                    {{ $item->media_type === 'blogs' ? 'checked' : '' }}
                                                    value="blogs">
                                                Article
                                            </label>

                                            <label class="f-w-500" for="edo-ani1">
                                                <input class="radio_animated" id="edo-ani1" type="radio"
                                                    name="media_type" value="images"
                                                    {{ $item->media_type === 'images' ? 'checked' : '' }}>
                                                Image
                                            </label>

                                            <label class="f-w-500" for="edo-ani3">
                                                <input class="radio_animated" id="edo-ani3" type="radio"
                                                    name="media_type" value="videos"
                                                    {{ $item->media_type === 'videos' ? 'checked' : '' }}>
                                                Video
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">URL (youtube , cloud)</label>
                                        <input class="form-control" type="text" name="media_url"
                                            value="{{ $item->media_url }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="d-block">Categorie:</label>

                                        <select
                                            class="js-example-placeholder-multiple col-sm-12 select2-hidden-accessible"
                                            tabindex="-1" name="categorie">
                                            <option value="AL">Lifestyle</option>
                                            <option value="WY">Travel</option>
                                        </select>
                                    </div>

                                    <div class="email-wrapper">
                                        <div class="theme-form">
                                            <div class="form-group">
                                                <label>Contenu:</label>
                                                <textarea id="editor1" name="contenu"
                                                    rows="10">{{ $item->contenu }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label></label>
                                    <input class="form-control" type="file" name="media" />
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
