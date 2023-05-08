<nav class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" type="button" onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
            {{ trans('panel.site_title') }}
        </a>
        <div class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden" id="example-collapse-sidebar">
            <div class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-300">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a class="md:block text-left md:pb-2 text-blueGray-700 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0" href="{{ route('admin.home') }}">
                            {{ trans('panel.site_title') }}
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button type="button" class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent" onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <form class="mt-6 mb-4 md:hidden">
                <div class="mb-3 pt-0">
                    @livewire('global-search')
                </div>
            </form>

            <!-- Divider -->
            <div class="flex md:hidden">
                @if(file_exists(app_path('Http/Livewire/LanguageSwitcher.php')))
                    <livewire:language-switcher />
                @endif
            </div>
            <hr class="mb-6 md:min-w-full" />
            <!-- Heading -->

            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a href="{{ route("admin.home") }}" class="{{ request()->is("admin") ? "sidebar-nav-active" : "sidebar-nav" }}">
                        <i class="fas fa-tv"></i>
                        {{ trans('global.dashboard') }}
                    </a>
                </li>

                @can('user_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/permissions*")||request()->is("admin/roles*")||request()->is("admin/users*")||request()->is("admin/audit-logs*")||request()->is("admin/health-conditions*")||request()->is("admin/spiritial-affiliations*")||request()->is("admin/skills*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-users">
                            </i>
                            {{ trans('cruds.userManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('permission_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/permissions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.permissions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-unlock-alt">
                                        </i>
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/roles*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.roles.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/users*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.users.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user">
                                        </i>
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('audit_log_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/audit-logs*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.audit-logs.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-file-alt">
                                        </i>
                                        {{ trans('cruds.auditLog.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('health_condition_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/health-conditions*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.health-conditions.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.healthCondition.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('spiritial_affiliation_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/spiritial-affiliations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.spiritial-affiliations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-address-book">
                                        </i>
                                        {{ trans('cruds.spiritialAffiliation.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('skill_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/skills*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.skills.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.skill.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('stock_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/stock-types*")||request()->is("admin/genders*")||request()->is("admin/breeds*")||request()->is("admin/colors*")||request()->is("admin/shelters*")||request()->is("admin/blocks*")||request()->is("admin/sources*")||request()->is("admin/general-stock-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-book">
                            </i>
                            {{ trans('cruds.stockRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('stock_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/stock-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.stock-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-list">
                                        </i>
                                        {{ trans('cruds.stockType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('gender_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/genders*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.genders.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.gender.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('breed_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/breeds*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.breeds.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.breed.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('color_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/colors*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.colors.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.color.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('shelter_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/shelters*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.shelters.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.shelter.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('block_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/blocks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.blocks.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.block.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('source_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sources*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sources.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.source.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('general_stock_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/general-stock-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.general-stock-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-clipboard-list">
                                        </i>
                                        {{ trans('cruds.generalStockRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('health_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/clinical-histories*")||request()->is("admin/current-diagnosis*")||request()->is("admin/treatment-administereds*")||request()->is("admin/manage-health-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-briefcase-medical">
                            </i>
                            {{ trans('cruds.healthRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('clinical_history_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/clinical-histories*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.clinical-histories.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-notes-medical">
                                        </i>
                                        {{ trans('cruds.clinicalHistory.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('current_diagnosi_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/current-diagnosis*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.current-diagnosis.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-notes-medical">
                                        </i>
                                        {{ trans('cruds.currentDiagnosi.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('treatment_administered_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/treatment-administereds*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.treatment-administereds.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-notes-medical">
                                        </i>
                                        {{ trans('cruds.treatmentAdministered.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_health_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-health-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-health-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-notes-medical">
                                        </i>
                                        {{ trans('cruds.manageHealthRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('ecto_parasite_mgt_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/acaricide-useds*")||request()->is("admin/manage-ecto-parasites*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-bug">
                            </i>
                            {{ trans('cruds.ectoParasiteMgtRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('acaricide_used_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/acaricide-useds*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.acaricide-useds.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bars">
                                        </i>
                                        {{ trans('cruds.acaricideUsed.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_ecto_parasite_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-ecto-parasites*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-ecto-parasites.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-bars">
                                        </i>
                                        {{ trans('cruds.manageEctoParasite.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('vaccination_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/vaccine-againsts*")||request()->is("admin/category-of-animals-vaccinateds*")||request()->is("admin/manage-vaccination-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-list">
                            </i>
                            {{ trans('cruds.vaccinationRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('vaccine_against_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/vaccine-againsts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.vaccine-againsts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.vaccineAgainst.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('category_of_animals_vaccinated_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/category-of-animals-vaccinateds*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.category-of-animals-vaccinateds.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.categoryOfAnimalsVaccinated.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_vaccination_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-vaccination-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-vaccination-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.manageVaccinationRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('breeding_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/delivery-natures*")||request()->is("admin/kid-numbers*")||request()->is("admin/breeding-comments*")||request()->is("admin/managebreeding-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon far fa-plus-square">
                            </i>
                            {{ trans('cruds.breedingRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('delivery_nature_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/delivery-natures*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.delivery-natures.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.deliveryNature.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('kid_number_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/kid-numbers*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.kid-numbers.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.kidNumber.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('breeding_comment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/breeding-comments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.breeding-comments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.breedingComment.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('managebreeding_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/managebreeding-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.managebreeding-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.managebreedingRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('sale_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/sale-purposes*")||request()->is("admin/manage-sale-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.saleRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('sale_purpose_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/sale-purposes*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.sale-purposes.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.salePurpose.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_sale_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-sale-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-sale-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon far fa-money-bill-alt">
                                        </i>
                                        {{ trans('cruds.manageSaleRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('farm_expense_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/expenditure-types*")||request()->is("admin/manage-expenses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-money-bill-wave">
                            </i>
                            {{ trans('cruds.farmExpense.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('expenditure_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/expenditure-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.expenditure-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.expenditureType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_expense_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-expenses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-expenses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.manageExpense.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('staff_record_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/staff-perfomances*")||request()->is("admin/staff-recommendations*")||request()->is("admin/staff-payment-records*")||request()->is("admin/manage-staff-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.staffRecord.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('staff_perfomance_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/staff-perfomances*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.staff-perfomances.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.staffPerfomance.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('staff_recommendation_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/staff-recommendations*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.staff-recommendations.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.staffRecommendation.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('staff_payment_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/staff-payment-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.staff-payment-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.staffPaymentRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('manage_staff_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/manage-staff-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.manage-staff-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.manageStaffRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('orchard_fruit_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/fruit-types*")||request()->is("admin/harvestors*")||request()->is("admin/harvestcomments*")||request()->is("admin/orchard-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-cogs">
                            </i>
                            {{ trans('cruds.orchardFruit.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('fruit_type_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/fruit-types*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.fruit-types.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.fruitType.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('harvestor_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/harvestors*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.harvestors.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.harvestor.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('harvestcomment_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/harvestcomments*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.harvestcomments.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.harvestcomment.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('orchard_record_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/orchard-records*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.orchard-records.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-cogs">
                                        </i>
                                        {{ trans('cruds.orchardRecord.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('user_alert_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/user-alerts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.user-alerts.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon fas fa-bell">
                            </i>
                            {{ trans('cruds.userAlert.title') }}
                        </a>
                    </li>
                @endcan
                @can('task_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/task-statuses*")||request()->is("admin/task-tags*")||request()->is("admin/tasks*")||request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-list">
                            </i>
                            {{ trans('cruds.taskManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('task_status_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-statuses*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-statuses.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskStatus.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_tag_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-tags*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-tags.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-server">
                                        </i>
                                        {{ trans('cruds.taskTag.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/tasks*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.tasks.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-briefcase">
                                        </i>
                                        {{ trans('cruds.task.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('task_calendar_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/task-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.task-calendars.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-calendar">
                                        </i>
                                        {{ trans('cruds.taskCalendar.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('contact_management_access')
                    <li class="items-center">
                        <a class="has-sub {{ request()->is("admin/contact-companies*")||request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="#" onclick="window.openSubNav(this)">
                            <i class="fa-fw fas c-sidebar-nav-icon fa-phone-square">
                            </i>
                            {{ trans('cruds.contactManagement.title') }}
                        </a>
                        <ul class="ml-4 subnav hidden">
                            @can('contact_company_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-companies*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-companies.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-building">
                                        </i>
                                        {{ trans('cruds.contactCompany.title') }}
                                    </a>
                                </li>
                            @endcan
                            @can('contact_contact_access')
                                <li class="items-center">
                                    <a class="{{ request()->is("admin/contact-contacts*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.contact-contacts.index") }}">
                                        <i class="fa-fw c-sidebar-nav-icon fas fa-user-plus">
                                        </i>
                                        {{ trans('cruds.contactContact.title') }}
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('system_calendar_access')
                    <li class="items-center">
                        <a class="{{ request()->is("admin/system-calendars*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.system-calendars.index") }}">
                            <i class="fa-fw c-sidebar-nav-icon far fa-calendar">
                            </i>
                            {{ trans('cruds.systemCalendar.title') }}
                        </a>
                    </li>
                @endcan
                <li class="items-center">
                    <a class="{{ request()->is("admin/messages*") ? "sidebar-nav-active" : "sidebar-nav" }}" href="{{ route("admin.messages.index") }}">
                        <i class="far fa-fw fa-envelope c-sidebar-nav-icon">
                        </i>
                        {{ __('global.messages') }}
                        @if($unreadConversations['all'])
                            <span class="text-xs bg-rose-500 text-white px-2 py-1 rounded-xl font-bold float-right">
                                {{ $unreadConversations['all'] }}
                            </span>
                        @endif
                    </a>
                </li>


                @if(file_exists(app_path('Http/Controllers/Auth/UserProfileController.php')))
                    @can('auth_profile_edit')
                        <li class="items-center">
                            <a href="{{ route("profile.show") }}" class="{{ request()->is("profile") ? "sidebar-nav-active" : "sidebar-nav" }}">
                                <i class="fa-fw c-sidebar-nav-icon fas fa-user-circle"></i>
                                {{ trans('global.my_profile') }}
                            </a>
                        </li>
                    @endcan
                @endif

                <li class="items-center">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();" class="sidebar-nav">
                        <i class="fa-fw fas fa-sign-out-alt"></i>
                        {{ trans('global.logout') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>