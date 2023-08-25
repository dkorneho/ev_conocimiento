<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/22be9c432d.js" crossorigin="anonymous"></script>
</head>
<body>
    <h1 class="text-center p-3">Control de Clientes</h1>

    <?php if(session("correcto")): ?>
        <div class="alert alert-success"><?php echo e(session("correcto")); ?></div>
    <?php endif; ?>
    <?php if(session("incorrecto")): ?>
        <div class="alert alert-danger"><?php echo e(session("incorrecto")); ?></div>
    <?php endif; ?>
    <div class="p-5 table-responsive">

        <table class="table table-striped table-bordered ">
            <thead class="bg-primary text-white">
              <tr>
                <th scope="col">Customer ID</th>
                <th scope="col">Store ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Active</th>
                <th scope="col">Create Date</th>
                <th scope="col">Last Update</th>
                <th scope="col">Options</th>
              </tr>
            </thead>
            <tbody>
                <button data-bs-toggle="modal" data-bs-target="#modalRegistrar" class="btn btn-success">New</button>
                <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Datos del Cliente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo e(route("crud.create")); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCode">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Store ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtStore">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Fisrt Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtFName">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtLName">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEmail">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Address ID</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtAddress">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Active</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtActive">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Create Date</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCDate">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Last Update</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtLUpdate">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Add New</button>
                                </div>
                            </form>
                        </div>

                    </div>
                    </div>
                </div>
                <?php $__currentLoopData = $datos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th><?php echo e($item->customer_id); ?></th>
                        <td><?php echo e($item->store_id); ?></td>
                        <td><?php echo e($item->first_name); ?></td>
                        <td><?php echo e($item->last_name); ?></td>
                        <td><?php echo e($item->email); ?></td>
                        <td><?php echo e($item->address_id); ?></td>
                        <td><?php echo e($item->active); ?></td>
                        <td><?php echo e($item->create_date); ?></td>
                        <td><?php echo e($item->last_update); ?></td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo e($item->customer_id); ?>" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="<?php echo e(route("crud.delete", $item->customer_id)); ?>" class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                        </td>

                        <!-- Modal de modificar datos -->
                        <div class="modal fade" id="modalEditar<?php echo e($item->customer_id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Editar Datos del Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route("crud.update")); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Customer ID</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCode" value="<?php echo e($item->customer_id); ?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Store ID</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtStore" value="<?php echo e($item->store_id); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Fisrt Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtFName" value="<?php echo e($item->first_name); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtLName" value="<?php echo e($item->last_name); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtEmail" value="<?php echo e($item->email); ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Address ID</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtAddress" value="<?php echo e($item->address_id); ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Active</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtActive" value="<?php echo e($item->active); ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Create Date</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtCDate" value="<?php echo e($item->create_date); ?>" >
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Last Update</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtLUpdate" value="<?php echo e($item->last_update); ?>">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            </div>
                        </div>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\crud_evaluacion\resources\views/welcome.blade.php ENDPATH**/ ?>