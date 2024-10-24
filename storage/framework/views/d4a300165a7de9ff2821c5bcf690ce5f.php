<div>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Lease List for <?php echo e($tenant->name); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="mb-4">
                        <a href="<?php echo e(route('leases.create', $tenant->id)); ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Lease
                        </a>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                        <div class="px-4 py-2 mb-4 text-sm text-green-700 bg-green-100 rounded-lg">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tenant Name</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Unit Number</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Start Date</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Rent Amount</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Security Deposit</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $leases; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lease): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($lease->tenant->name); ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($lease->unit->unit_number); ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($lease->start_date); ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($lease->rent_amount); ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500"><?php echo e($lease->security_deposit); ?></td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                     <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($lease->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?>">
                            <?php echo e($lease->is_active ? 'Active' : 'Inactive'); ?>

                        </span>
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                                    <a href="<?php echo e(route('leases.edit', ['tenantId' => $tenantId,   'leaseId' => $lease->id])); ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        </tbody>
                    </table>

                    <div class="mt-4">
                        <?php echo e($leases->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/codelab/Desktop/Projects/LaravelGarage/RentalAgency/resources/views/livewire/tenant/lease-list.blade.php ENDPATH**/ ?>