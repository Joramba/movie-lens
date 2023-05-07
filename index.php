<?php require_once('functions.php') ?>

<?php include("header.php") ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="movies-tab" data-bs-toggle="tab" data-bs-target="#movies" type="button"
      role="tab" aria-controls="movies" aria-selected="true">Movies</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="add-movie-tab" data-bs-toggle="tab" data-bs-target="#add-movie" type="button"
      role="tab" aria-controls="add-movie" aria-selected="false">Add Movie</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="ratings-tab" data-bs-toggle="tab" data-bs-target="#ratings" type="button" role="tab"
      aria-controls="ratings" aria-selected="false">Ratings</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="add-rating-tab" data-bs-toggle="tab" data-bs-target="#add-rating" type="button"
      role="tab" aria-controls="add-rating" aria-selected="false">Add rating</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="tags-tab" data-bs-toggle="tab" data-bs-target="#tags" type="button" role="tab"
      aria-controls="tags" aria-selected="false">Tags</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="add-tag-tab" data-bs-toggle="tab" data-bs-target="#add-tag" type="button" role="tab"
      aria-controls="add-tag" aria-selected="false">Add tag</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="users-tab" data-bs-toggle="tab" data-bs-target="#users" type="button" role="tab"
      aria-controls="users" aria-selected="false">Users</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="import-movie-tab" data-bs-toggle="tab" data-bs-target="#import-movie" type="button"
      role="tab" aria-controls="import-movie" aria-selected="false">Import</button>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="movies" role="tabpanel" aria-labelledby="home-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <?php get_all_movies() ?>
      </div>
    </div>
  </div>


  <div class="tab-pane" id="add-movie" role="tabpanel" aria-labelledby="profile-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col-8">
          <form action="insert_movie.php" method="post">
            <div class="col-md-4 mb-4">
              <div class="form-group">
                <label>Movie Id</label>
                <input type="text" name="movieId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Movie Title</label>
                <input type="text" name="title" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Movie Genres</label>
                <input type="text" name="genres" class="form-control" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Movie</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="ratings" role="tabpanel" aria-labelledby="messages-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <?php get_all_rating() ?>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="add-rating" role="tabpanel" aria-labelledby="messages-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col-8">
          <form action="insert_rating.php" method="post">
            <div class="col-md-4 mb-4">
              <div class="form-group">
                <label>User Id</label>
                <input type="text" name="userId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Movie Id</label>
                <input type="text" name="movieId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Rating</label>
                <input type="text" name="rating" class="form-control" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Rating</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="tags" role="tabpanel" aria-labelledby="messages-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <?php get_all_tags() ?>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="add-tag" role="tabpanel" aria-labelledby="messages-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col-8">
          <form action="insert_tag.php" method="post">
            <div class="col-md-4 mb-4">
              <div class="form-group">
                <label>User Id</label>
                <input type="text" name="userId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Movie Id</label>
                <input type="text" name="movieId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Tag</label>
                <input type="text" name="tag" class="form-control" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add Tag</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="import-movie" role="tabpanel" aria-labelledby="messages-tab">
    <div id="wrap">
      <div class="container">
        <div class="row">
          <form class="form-horizontal" action="functions.php" method="post" name="upload_excel"
            enctype="multipart/form-data">
            <fieldset>
              <!-- Form Name -->
              <legend>Form Name</legend>
              <!-- File Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="filebutton">Select File</label>
                <div class="col-md-4">
                  <input type="file" name="file" id="file" class="input-large">
                </div>
              </div>
              <!-- Button -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                <div class="col-md-4">
                  <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading"
                    data-loading-text="Loading...">Import</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="tab-pane" id="users" role="tabpanel" aria-labelledby="messages-tab">
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <div class="col-8">
          <form action="insert_user.php" method="post">
            <div class="col-md-4 mb-4">
              <div class="form-group">
                <label>User Id</label>
                <input type="text" name="userId" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Login</label>
                <input type="text" name="login" class="form-control" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Add User</button>
          </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-content-center align-items-center g-2">
        <?php get_all_users() ?>
      </div>
    </div>
  </div>

  <?php include("footer.php") ?>