<?= $this->extend('template') ?>
<?= $this->section('content') ?>

        <nav class="navbar bg-dark">
            <div class="container-fluid justify-content-center">
              <div class="row mx-100">
                <div class="col mx-100">
                  <h1 class="text-light">
                    Restoraunt Name - Table X
                  </h1>
                </div>
              </div>
            </div>
          </nav>
  </header>

  <ul class="nav justify-content-center sticky-top bg-body-tertiary">
    <li class="nav-item">
      <a class="nav-link" href="#Burger">Burger</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#Meats">Meats</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#Salads">Salads</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#Drinks">Drinks</a>
    </li>
  </ul>

  <div class="offcanvas offcanvas-bottom h-75" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasBottomLabel">Edit Menu Item</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body small">
      <div class="row px-5">
        <div class="col">
            <div class="mb-3">
                <label for="itemName" class="form-label">ItemName</label>
                <input class="form-control" id="itemName">
              </div>
            
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="2"></textarea>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label for="energy" class="form-label">Energy</label>
                    <div class="input-group">
                      <input type="text" class="form-control" id="energy" aria-describedby="basic-addon3 basic-addon4">
                      <span class="input-group-text" id="basic-addon3">Kj</span>
                    </div>
                    <div class="form-text" id="basic-addon4">Put 0 if you want the energy blank</div>
                  </div>
                </div>
                <div class="col">
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon3">$</span>
                      <input type="text" class="form-control" id="price" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                  </div>
                </div>
              </div>
        </div>

        <div class="col">
            <div class="mb-3">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" id="formFile">
            </div>

            

            <label for="Type" class="form-label">Category</label>
            <div class="input-group mb-3">
                <select class="form-select" id="Type" >
                  <option selected>Choose...</option>
                  <option value="1">Burger</option>
                  <option value="2">Meats</option>
                  <option value="3">Salads</option>
                  <option value="3">Drinks</option>
                </select>
            </div>

            <div class="input-group mb-3">
              <button class="btn btn-outline-secondary" type="button">Add New Catergory</button>
              <input class="form-control" id="itemName">
            </div>


            
            

        </div>
      </div>
      <div class="row">
        <div class="d-grid gap-2 col-5 mx-auto p-3">
          <button type="button" class="btn btn-warning btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Confirm Changes</button>
        </div>
        <div class="gap-2 col-5 mx-auto p-3">
          <button type="button" class="btn btn-danger btn-small" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Delete Item</button>
        </div>
      </div>
    </div>
  </div>


  <main>
      <section id="Burger" class="py-5">
        <div class="container">
          <div class="row gy-2">
            <div class="col-12">
              <figure class="text-center">
                  <h2>Burger</h2>
                <p class="text-body-secondary">Bun, lettuce, tomato, meat, bun </p>
              </figure>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                      <div class="container">
                        <div class="row">
                          <div class="col-3">2510kJ</div>
                          <div class="col-3">$13.90</div>
                          <div class="col-6">
                            <a href="" class="card-block stretched-link text-decoration-none text-warning" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">
                              <strong>EDIT</strong>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">3</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">4</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">5</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">6</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>


      <section id="Meats" class="py-5">
        <div class="container">
          <div class="row gy-2">
            <div class="col-12">
              <figure class="text-center">
                  <h2>Meats</h2>
                <p class="text-body-secondary">chicken, beef, pork, lamb </p>
              </figure>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">3</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">4</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">5</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">6</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>

      <section id="Salads" class="py-5">
        <div class="container">
          <div class="row gy-2">
            <div class="col-12">
              <figure class="text-center"> 
                  <h2>Salads</h2>
                <p class="text-body-secondary">vegitables</p>
              </figure>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">3</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">4</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">5</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">6</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>

      <section id="Drinks" class="py-5">
        <div class="container">
          <div class="row gy-2">
            <div class="col-12">
              <figure class="text-center">
                  <h2>Drinks</h2>
                <p class="text-body-secondary">We got them</p>
              </figure>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">1</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">2</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">3</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">4</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">5</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6">
              <div class="card">
                <div class="row">
                  <div class="col-4">
                    <img src="Images\placeholder.png" class="img-fluid rounded-start">
                  </div>
                  <div class="col-8">
                    <div class="card-body">
                      <h5 class="card-title">6</h5>
                      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
        </div>
      </section>
  </main>

  <div class="nav justify-content-center sticky-bottom bg-body-tertiary">
    <div class="d-grid gap-2 col-5 mx-auto p-3">
      <button type="button" class="btn btn-success btn-lg" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Add Item</button>
    </div>
  </div>

  <?= $this->endSection() ?>