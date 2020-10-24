<div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Form Usulan Baru</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Usulan pengajuan penelitian pendanaan institusi
                                    </p>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tahun Akademik</label>
                                                        <div class="col-10">
                                                            <select class="form-control" name="tahuns">
                                                                <option>---</option>
                                                                <?php foreach ($tahuns as $tahun) { ?>
                                                                <option value="<?=$tahun->tahun;?>"><?=$tahun->tahun;?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Nama</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="Some text value...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">NIDN/</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="Some text value...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Text</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" value="Some text value...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Email</label>
                                                        <div class="col-10">
                                                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Password</label>
                                                        <div class="col-10">
                                                            <input type="password" class="form-control" value="password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Placeholder</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="placeholder">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Text area</label>
                                                        <div class="col-10">
                                                            <textarea class="form-control" rows="5"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Readonly</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" readonly="" value="Readonly value">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Disabled</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" disabled="" value="Disabled value">
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Static control</label>
                                                        <div class="col-10">
                                                            <p class="form-control-static">email@example.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Helping text</label>
                                                        <div class="col-10">
                                                            <input type="text" class="form-control" placeholder="Helping text">
                                                            <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Input Select</label>
                                                        <div class="col-10">
                                                            <select class="form-control">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                            <h6>Multiple select</h6>
                                                            <select multiple class="form-control">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Default file input</label>
                                                        <div class="col-10">
                                                            <input type="file" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Date</label>
                                                        <div class="col-10">
                                                            <input class="form-control" type="date" name="date">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Month</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="month" name="month">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Time</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="time" name="time">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Week</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="week" name="week">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Number</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="number" name="number">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">URL</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="url" name="url">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Search</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="search" name="search">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tel</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="tel" name="tel">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Color</label>
                                                        <div class="col-md-10">
                                                            <input class="form-control" type="color" name="color">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Range</label>
                                                        <div class="col-md-10">
                                                            <input class="custom-range" type="range" name="range" min="0" max="10">
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- end row -->

                                </div> <!-- end card-box -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4 class="m-t-0 header-title">Select menu</h4>
                                            <p class="text-muted m-b-30 font-14">
                                                Custom <code class="highlighter-rouge">&lt;select&gt;</code> menus need only a custom class, <code class="highlighter-rouge">.custom-select</code> to trigger the custom styles.
                                            </p>

                                            <select class="custom-select mt-3">
                                                <option selected>Open this select menu</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>

                                            <h4 class="header-title mt-5">Switches</h4>
                                            <p class="text-muted">
                                                A switch has the markup of a custom checkbox but uses the <code>.custom-switch</code> class to render a toggle switch. Switches also support the <code>disabled</code> attribute.
                                            </p>

                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
                                            </div>
                                            <div class="custom-control custom-switch mt-1">
                                                <input type="checkbox" class="custom-control-input" disabled="" id="customSwitch2">
                                                <label class="custom-control-label" for="customSwitch2">Disabled switch element</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <h4 class="header-title">Checkboxes and radios</h4>
                                            <div class="mt-3">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                                </div>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                    <label class="custom-control-label" for="customCheck2">Check this custom checkbox</label>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Input Sizes & Group</h4>
                                    <p class="text-muted m-b-30 font-14">
                                        Set heights using classes like <code>.input-lg</code>, and set widths using grid column classes like <code>.col-lg-*</code>.
                                    </p>

                                    <div class="p-20">
                                        <form role="form" class="form-horizontal">
                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="example-input-small">Small</label>
                                                <div class="col-10">
                                                    <input type="text" id="example-input-small" name="example-input-small" class="form-control form-control-sm" placeholder=".input-sm">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="example-input-normal">Normal</label>
                                                <div class="col-10">
                                                    <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label" for="example-input-large">Large</label>
                                                <div class="col-10">
                                                    <input type="text" id="example-input-large" name="example-input-large" class="form-control form-control-lg" placeholder=".input-lg">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Grid Sizes</label>
                                                <div class="col-10">
                                                    <input type="text" class="form-control" placeholder=".col-sm-4">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Static</label>
                                                <div class="col-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">@</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Dropdowns</label>
                                                <div class="col-10">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-primary waves-effect waves-light dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Action</a>
                                                                <a class="dropdown-item" href="#">Another action</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                                <div role="separator" class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                            </div>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-2 col-form-label">Buttons</label>
                                                <div class="col-10">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-dark waves-effect waves-light" type="button">Button</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div> <!-- end card-box -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4 class="m-t-0 m-b-30 header-title">Basic Example</h4>

                                    <form role="form">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <input id="checkbox0" type="checkbox">
                                                <label for="checkbox0">
                                                    Check me out
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4 class="m-t-0 m-b-30 header-title">Horizontal form</h4>

                                    <form class="form-horizontal" role="form">
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                                            <div class="col-9">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-3 col-form-label">Password</label>
                                            <div class="col-9">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword5" class="col-3 col-form-label">Re Password</label>
                                            <div class="col-9">
                                                <input type="password" class="form-control" id="inputPassword5" placeholder="Retype Password">
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-end">
                                            <div class=" col-9">
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox2" type="checkbox">
                                                    <label for="checkbox2">
                                                        Check me out !
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0 justify-content-end row">
                                            <div class="col-9">
                                                <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->


                        <!-- Inline Form -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Inline Form</h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Add <code>.form-inline</code> to your form (which doesn't have to be a <code>&lt;form&gt;</code>)
                                        for left-aligned and inline-block controls. <strong>This only applies to forms within viewports
                                        that are at least 768px wide.</strong>
                                    </p>
                                    <div class="row m-b-30">
                                        <div class="col-sm-12">
                                            <form class="form-inline">
                                                <div class="form-group">
                                                    <label for="staticEmail2" class="sr-only">Email</label>
                                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                                                </div>
                                                <div class="form-group mx-sm-3">
                                                    <label for="inputPassword2" class="sr-only">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Confirm identity</button>
                                            </form>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-sm-12">
                                            <h6 class="font-13 mt-4">Auto-sizing</h6>

                                            <form>
                                                <div class="form-row align-items-center">
                                                    <div class="col-auto">
                                                        <label class="sr-only" for="inlineFormInput">Name</label>
                                                        <input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Jane Doe">
                                                    </div>
                                                    <div class="col-auto">
                                                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                                                        <div class="input-group mb-2">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">@</div>
                                                            </div>
                                                            <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox" id="autoSizingCheck">
                                                            <label class="form-check-label" for="autoSizingCheck">
                                                                Remember me
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->



                        <!-- Form row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title">Form row</h4>
                                    <p class="text-muted m-b-30 font-13">
                                        You may also swap <code class="highlighter-rouge">.row</code> for <code class="highlighter-rouge">.form-row</code>, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
                                    </p>

                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Email</label>
                                                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Password</label>
                                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress" class="col-form-label">Address</label>
                                            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputAddress2" class="col-form-label">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity" class="col-form-label">City</label>
                                                <input type="text" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState" class="col-form-label">State</label>
                                                <select id="inputState" class="form-control">Choose</select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputZip" class="col-form-label">Zip</label>
                                                <input type="text" class="form-control" id="inputZip">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox"> Check me out
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Sign in</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </div> <!-- container -->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Tags Input</h4>

                                    <h5><b>Input Tags</b></h5>
                                    <p class="text-muted m-b-20 font-13">
                                        Just add <code>data-role="tagsinput"</code> to your input field to automatically change it to a tags input field.
                                    </p>
                                    <div class="tags-default">
                                        <input type="text" value="Amsterdam,Washington,Sydney" data-role="tagsinput" placeholder="add tags"/>
                                    </div>

                                    <h5 class="m-t-40"><b>True multi value</b></h5>
                                    <p class="text-muted m-b-20 font-13">
                                        Use a <code>&lt;select multiple /&gt;</code> as your input element for a tags input, to gain true multivalue support.
                                        Instead of a comma separated string, the values will be set in an array. Existing <code>&lt;option /&gt;</code>
                                        elements will automatically be set as tags. This makes it also possible to create tags containing a comma.
                                    </p>
                                    <div class="m-b-0">
                                        <select multiple data-role="tagsinput">
                                            <option value="Amsterdam">Amsterdam</option>
                                            <option value="Washington">Washington</option>
                                            <option value="Sydney">Sydney</option>
                                        </select>
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Switchery</h4>

                                    <h5><b>Basic</b></h5>
                                    <p class="text-muted m-b-20 font-13">
                                        Add an attribute <code>
                                        data-plugin="switchery" data-color="@colors"</code>
                                        to your input element and it will be converted into switch.
                                    </p>

                                    <div class="switchery-demo">
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#ffaa00"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#3bafda"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#3DDCF7"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#7266ba"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#f76397"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#4c5667"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#98a6ad"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#ef5350"/>
                                    </div>

                                    <h5 class="m-t-40"><b>Sizes & Secondary color</b></h5>
                                    <p class="text-muted m-b-20 font-13">
                                        Add an attribute <code>
                                        data-size="small",data-size="large"</code>,<code>
                                        data-color="@color" data-secondary-color="@color"</code>
                                        to your input element and it will be converted into switch.
                                    </p>

                                    <div class="">
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#00b19d" data-size="small"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#3DDCF7"/>
                                        <input type="checkbox" checked data-plugin="switchery" data-color="#4c5667" data-size="large"/>
                                        <input type="checkbox" data-plugin="switchery" data-color="#1AB394" data-secondary-color="#ED5565" />
                                        <input type="checkbox" data-plugin="switchery" data-color="#fb6d9d"  data-secondary-color="#7266ba" />
                                    </div>

                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Multiple Select</h4>

                                    <h5><b>Default</b></h5>
                                    <p class="text-muted m-b-15 font-13">
                                        Use a <code>
                                        &lt;select multiple /&gt;</code>
                                        as your input element for a tags input, to gain true multivalue support.
                                    </p>

                                    <select multiple="multiple" class="multi-select" id="my_multi_select1" name="my_multi_select1[]" data-plugin="multiselect">
                                        <option>Dallas Cowboys</option>
                                        <option>New York Giants</option>
                                        <option selected>Philadelphia Eagles</option>
                                        <option selected>Washington Redskins</option>
                                        <option>Chicago Bears</option>
                                        <option>Detroit Lions</option>
                                        <option>Green Bay Packers</option>
                                        <option>Minnesota Vikings</option>
                                        <option selected>Atlanta Falcons</option>
                                        <option>Carolina Panthers</option>
                                        <option>New Orleans Saints</option>
                                        <option>Tampa Bay Buccaneers</option>
                                        <option>Arizona Cardinals</option>
                                        <option>St. Louis Rams</option>
                                        <option>San Francisco 49ers</option>
                                        <option>Seattle Seahawks</option>
                                    </select>

                                    <h5 class="m-t-30"><b>Grouped Options</b></h5>
                                    <p class="text-muted m-b-15 font-13">
                                        Use a <code>
                                        &lt;select multiple /&gt;</code>
                                        as your input element for a tags input, to gain true multivalue support.
                                    </p>

                                    <select multiple="multiple" class="multi-select" id="my_multi_select2" name="my_multi_select2[]" data-plugin="multiselect" data-selectable-optgroup="true">
                                        <optgroup label="NFC EAST">
                                            <option>Dallas Cowboys</option>
                                            <option>New York Giants</option>
                                            <option>Philadelphia Eagles</option>
                                            <option>Washington Redskins</option>
                                        </optgroup>
                                        <optgroup label="NFC NORTH">
                                            <option>Chicago Bears</option>
                                            <option>Detroit Lions</option>
                                            <option>Green Bay Packers</option>
                                            <option>Minnesota Vikings</option>
                                        </optgroup>
                                        <optgroup label="NFC SOUTH">
                                            <option>Atlanta Falcons</option>
                                            <option>Carolina Panthers</option>
                                            <option>New Orleans Saints</option>
                                            <option>Tampa Bay Buccaneers</option>
                                        </optgroup>
                                        <optgroup label="NFC WEST">
                                            <option>Arizona Cardinals</option>
                                            <option>St. Louis Rams</option>
                                            <option>San Francisco 49ers</option>
                                            <option>Seattle Seahawks</option>
                                        </optgroup>
                                    </select>

                                    <h5 class="m-t-30"><b>Searchable</b></h5>
                                    <p class="text-muted m-b-15 font-13">
                                        Use a <code>
                                        &lt;select multiple /&gt;</code>
                                        as your input element for a tags input, to gain true multivalue support.
                                    </p>

                                    <select name="country" class="multi-select" multiple="" id="my_multi_select3" >
                                        <option value="AF">Afghanistan</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia</option>
                                        <option value="BA">Bosnia and Herzegowina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote d'Ivoire</option>
                                        <option value="HR">Croatia (Hrvatska)</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard and Mc Donald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran (Islamic Republic of)</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macau</option>
                                        <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="AN">Netherlands Antilles</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint LUCIA</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SK">Slovakia (Slovak Republic)</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SH">St. Helena</option>
                                        <option value="PM">St. Pierre and Miquelon</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands (British)</option>
                                        <option value="VI">Virgin Islands (U.S.)</option>
                                        <option value="WF">Wallis and Futuna Islands</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xl-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Select2</h4>

                                    <h5><b>Single Select</b></h5>

                                    <select class="form-control select2">
                                        <option>Select</option>
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>

                                    <h5 class="m-t-30"><b>Multiple Select</b></h5>

                                    <select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>

                                    <h5 class="m-t-30"><b>Limiting the number of selections</b></h5>

                                    <select class="select2-limiting" multiple="multiple">
                                        <optgroup label="Alaskan/Hawaiian Time Zone">
                                            <option value="AK">Alaska</option>
                                            <option value="HI">Hawaii</option>
                                        </optgroup>
                                        <optgroup label="Pacific Time Zone">
                                            <option value="CA">California</option>
                                            <option value="NV">Nevada</option>
                                            <option value="OR">Oregon</option>
                                            <option value="WA">Washington</option>
                                        </optgroup>
                                        <optgroup label="Mountain Time Zone">
                                            <option value="AZ">Arizona</option>
                                            <option value="CO">Colorado</option>
                                            <option value="ID">Idaho</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="UT">Utah</option>
                                            <option value="WY">Wyoming</option>
                                        </optgroup>
                                        <optgroup label="Central Time Zone">
                                            <option value="AL">Alabama</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TX">Texas</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="WI">Wisconsin</option>
                                        </optgroup>
                                        <optgroup label="Eastern Time Zone">
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="IN">Indiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="OH">Ohio</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WV">West Virginia</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Input Masks</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <form action="#">
                                                    <div class="form-group">
                                                        <label>ISBN 1</label>
                                                        <input type="text" placeholder="" data-mask="999-99-999-9999-9" class="form-control">
                                                        <span class="font-13 text-muted">e.g "999-99-999-9999-9"</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ISBN 2</label>
                                                        <input type="text" placeholder="" data-mask="999 99 999 9999 9" class="form-control">
                                                        <span class="font-13 text-muted">999 99 999 9999 9</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>ISBN 3</label>
                                                        <input type="text" placeholder="" data-mask="999/99/999/9999/9" class="form-control">
                                                        <span class="font-13 text-muted">999/99/999/9999/9</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>IPV4</label>
                                                        <input type="text" placeholder="" data-mask="999.999.999.9999" class="form-control">
                                                        <span class="font-13 text-muted">192.168.110.310</span>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label>IPV6</label>
                                                        <input type="text" placeholder="" data-mask="9999:9999:9999:9:999:9999:9999:9999" class="form-control">
                                                        <span class="font-13 text-muted">4deg:1340:6547:2:540:h8je:ve73:98pd</span>
                                                    </div>

                                                </form>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <form action="#">

                                                    <div class="form-group">
                                                        <label>Tax ID</label>
                                                        <input type="text" placeholder="" data-mask="99-9999999" class="form-control">
                                                        <span class="font-13 text-muted">99-9999999</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control">
                                                        <span class="font-13 text-muted">(999) 999-9999</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Currency</label>
                                                        <input type="text" placeholder="" data-mask="$ 999,999,999.99" class="form-control">
                                                        <span class="font-13 text-muted">$ 999,999,999.99</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Date</label>
                                                        <input type="text" placeholder="" data-mask="99/99/9999" class="form-control">
                                                        <span class="font-13 text-muted">dd/mm/yyyy</span>
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label>Date 2</label>
                                                        <input type="text" placeholder="" data-mask="99-99-9999" class="form-control">
                                                        <span class="font-13 text-muted">dd-mm-yyyy</span>
                                                    </div>

                                                </form>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->

                                </div>

                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Bootstrap TouchSpin</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <form>
                                                    <div class="form-group">
                                                        <label class="control-label">Vertical button alignment</label>
                                                        <input class="vertical-spin" type="text" value="" name="vertical-spin">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Using data attributes</label>
                                                        <input id="demo0" type="text" value="55" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Example with postfix (large)</label>
                                                        <input id="demo1" type="text" value="55" name="demo1">
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">With prefix </label>
                                                        <input id="demo2" type="text" value="0" name="demo2" class=" form-control">
                                                    </div>

                                                </form>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <form>

                                                    <div class="form-group">
                                                        <label class="control-label">Init with empty value:</label>
                                                        <input id="demo3" type="text" value="" name="demo3">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Value attribute is not set (applying settings.initval)</label>
                                                        <input id="demo3_21" type="text" value="" name="demo3_21">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Value is set explicitly to 33 (skipping settings.initval) </label>
                                                        <input id="demo3_22" type="text" value="33" name="demo3_22">
                                                    </div>
                                                    <div class="form-group m-b-0">
                                                        <label class="control-label">Button group</label>
                                                        <div class="input-group">
                                                            <input id="demo5" type="text" class="form-control" name="demo5" value="50">
                                                            <div class="input-group-btn">
                                                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                                                    <span class="caret"></span>
                                                                    <span class="sr-only">Toggle Dropdown</span>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <!-- item-->
                                                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                                                    <!-- item-->
                                                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                                                    <!-- item-->
                                                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                                                    <!-- item-->
                                                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Timepicker</h4>

                                    <div class="form-group">
                                        <label>Default Time Picker</label>
                                        <div class="input-group">
                                            <input id="timepicker" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                            </div>
                                        </div><!-- input-group -->
                                    </div>

                                    <div class="form-group">
                                        <label>24 Hour Mode Time Picker</label>
                                        <div class="input-group">
                                            <input id="timepicker2" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                            </div>
                                        </div><!-- input-group -->
                                    </div>

                                    <div class="form-group mb-0">
                                        <label>Specify a step for the minute field</label>
                                        <div class="input-group">
                                            <input id="timepicker3" type="text" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-clock"></i></span>
                                            </div>
                                        </div><!-- input-group -->
                                    </div>


                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-6">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Colorpicker</h4>

                                    <div class="">
                                        <form action="#">
                                            <div class="form-group">
                                                <label>Default</label>
                                                <input type="text" class="colorpicker-default form-control" value="#8fff00">
                                            </div>
                                            <div class="form-group">
                                                <label>RGBA</label>
                                                <input type="text" class="colorpicker-rgba form-control" value="rgb(0,194,255,0.78)" data-color-format="rgba">
                                            </div>
                                            <div class="form-group mb-0">
                                                <label>As Component</label>
                                                <div data-color-format="rgb" data-color="rgb(255, 146, 180)" class="colorpicker-default input-group">
                                                    <input type="text" readonly="readonly" value="" class="form-control">
                                                    <span class="input-group-append add-on">
                                                        <button class="btn btn-white" type="button">
                                                            <i style="background-color: rgb(124, 66, 84);margin-top: 2px;"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Date Picker</h4>

                                    <div class="row">
                                        <div class="col-lg-8">

                                            <div class="p-20">
                                                <form action="#" class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label class="control-label col-sm-4">Default Functionality</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                                                </div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-sm-4">Auto Close</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                                                </div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-sm-4">Multiple Date</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-multiple-date">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="ti-calendar"></i></span>
                                                                </div>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="control-label col-sm-4">Date Range</label>
                                                        <div class="col-sm-8">
                                                            <div class="input-daterange input-group" id="date-range">
                                                                <input type="text" class="form-control" name="start" />
                                                                <input type="text" class="form-control" name="end" />
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-lg-4">
                                            <div class="p-20">
                                                <label>Display Inline</label>
                                                <div class="input-group">
                                                    <div id="datepicker-inline"></div>
                                                </div><!-- input-group -->
                                            </div>
                                        </div><!-- end col -->

                                    </div><!-- end row-->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Date Range Picker</h4>

                                    <div class="row">
                                        <div class="col-lg-9">
                                            <div class="p-20">
                                                <form class="form-horizontal">
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label">With all options</label>
                                                        <div class="col-lg-8">
                                                            <div id="reportrange" class="pull-right form-control">
                                                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                                <span></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label">Date Range Pick</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="01/01/2015 - 01/31/2015"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-4 control-label">Date Range With Time</label>
                                                        <div class="col-lg-8">
                                                            <input type="text" class="form-control input-daterange-timepicker" name="daterange" value="01/01/2015 1:30 PM - 01/01/2015 2:00 PM"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-0">
                                                        <label class="col-lg-4 control-label">Limit Selectable Dates</label>
                                                        <div class="col-lg-8">
                                                            <input class="form-control input-limit-datepicker" type="text" name="daterange" value="06/01/2015 - 06/07/2015"/>
                                                        </div>
                                                    </div>
                                                </form>

                                            </div>

                                        </div><!-- end col -->

                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                        </div>
                                    </div>

                                    <h4 class="header-title m-t-0 m-b-30">Bootstrap MaxLength</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <h5><b>Default usage</b></h5>
                                                <input type="text" class="form-control" maxlength="25" name="defaultconfig" id="defaultconfig" />

                                                <div class="m-t-20">
                                                    <input type="text" maxlength="25" name="thresholdconfig" class="form-control" id="thresholdconfig" />
                                                </div>

                                                <div class="m-t-20">
                                                    <h5><b>Few options</b></h5>
                                                    <input type="text" class="form-control" maxlength="25" name="moreoptions" id="moreoptions" />
                                                </div>
                                            </div>
                                        </div><!-- end col -->

                                        <div class="col-md-6">
                                            <div class="p-20">
                                                <h5><b>All the options</b></h5>
                                                <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />

                                                <div class="m-t-20">
                                                    <h5><b>position</b></h5>
                                                    <input type="text" class="form-control" maxlength="25" name="placement" id="placement" />
                                                </div>
                                                <div class="m-t-20">
                                                    <h5><b>textareas</b></h5>
                                                    <textarea id="textarea" class="form-control" maxlength="225" rows="2" placeholder="This textarea has a limit of 225 chars."></textarea>
                                                </div>
                                            </div>
                                        </div><!-- end col -->
                                    </div><!-- end row -->
                                </div>
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                    <script type="text/javascript" src="<?php echo base_url() ?>assets/adminto/assets/plugins/multiselect/js/jquery.multi-select.js"></script>
                    <script src="<?php echo base_url() ?>assets/adminto/assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
                    <script>
                        jQuery(document).ready(function() {
                            // Select2
                            $(".select2").select2();
                        });
                    </script>