<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 col-lg-offset-3">
            <form action="/create/todo" method=post>
            <?php echo e(csrf_field()); ?>

            <input type="text" class="form-control input-lg" name="todo" placeholder="Create new todo" required=required>
        </form>
        </div>
    </div>
        <br>
        <?php $__currentLoopData = $todos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todo): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <?php echo e($todo->todo); ?> <a href="<?php echo e(route('todo.delete', ['id' => $todo->id])); ?>" class="btn btn-danger"> x </a> <a href="<?php echo e(route('todo.update', ['id' => $todo->id])); ?>" class="btn btn-danger btn-xs"> update </a> 

        <?php if(!$todo->completed): ?>
            <a href="<?php echo e(route('todos.completed', ['id' => $todo->id])); ?>" class="btn btn-xs btn-success">Mark as completed</a>
        <?php else: ?>
        <span class="text-success">Finished</span>
        <?php endif; ?>
        <hr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>