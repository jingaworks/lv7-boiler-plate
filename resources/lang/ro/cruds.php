<?php

return [
    'userManagement' => [
        'title'          => 'Gestiune utilizatori',
        'title_singular' => 'Gestiune utilizatori',
    ],
    'permission'     => [
        'title'          => 'Permisiuni',
        'title_singular' => 'Permisiune',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roluri',
        'title_singular' => 'Rol',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Utilizatori',
        'title_singular' => 'Utilizator',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'name'                      => 'Name',
            'name_helper'               => '',
            'email'                     => 'Email',
            'email_helper'              => '',
            'email_verified_at'         => 'Email verified at',
            'email_verified_at_helper'  => '',
            'password'                  => 'Password',
            'password_helper'           => '',
            'roles'                     => 'Roles',
            'roles_helper'              => '',
            'remember_token'            => 'Remember Token',
            'remember_token_helper'     => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
            'phone'                     => 'Phone',
            'phone_helper'              => '',
            'verified'                  => 'Verified',
            'verified_helper'           => '',
            'verified_at'               => 'Verified at',
            'verified_at_helper'        => '',
            'verification_token'        => 'Verification token',
            'verification_token_helper' => '',
        ],
    ],
    'atestat'        => [
        'title'          => 'Atestat',
        'title_singular' => 'Atestat',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Name',
            'name_helper'       => '',
            'address'           => 'Address',
            'address_helper'    => '',
            'number'            => 'Number',
            'number_helper'     => '',
            'valid_year'        => 'Valid Year',
            'valid_year_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
            'serie'             => 'Serie',
            'serie_helper'      => '',
            'region'            => 'Region',
            'region_helper'     => '',
            'place'             => 'Place',
            'place_helper'      => '',
            'image'             => 'Image',
            'image_helper'      => '',
        ],
    ],
    'region'         => [
        'title'          => 'Region',
        'title_singular' => 'Region',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'denj'              => 'Judet',
            'denj_helper'       => '',
            'fsj'               => 'Fsj',
            'fsj_helper'        => '',
            'mnemonic'          => 'Mnemonic',
            'mnemonic_helper'   => '',
            'zona'              => 'Zona',
            'zona_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'place'          => [
        'title'          => 'Place',
        'title_singular' => 'Place',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'denloc'            => 'Localitate',
            'denloc_helper'     => '',
            'codp'              => 'Cod postal',
            'codp_helper'       => '',
            'sirsup'            => 'Sirsup',
            'sirsup_helper'     => '',
            'tip'               => 'Tip',
            'tip_helper'        => '',
            'zona'              => 'Zona',
            'zona_helper'       => '',
            'niv'               => 'Niv',
            'niv_helper'        => '',
            'med'               => 'Med',
            'med_helper'        => '',
            'regiune'           => 'Regiune',
            'regiune_helper'    => '',
            'fsj'               => 'Fsj',
            'fsj_helper'        => '',
            'fs_2'              => 'Fs 2',
            'fs_2_helper'       => '',
            'fs_3'              => 'Fs 3',
            'fs_3_helper'       => '',
            'fsl'               => 'Fsl',
            'fsl_helper'        => '',
            'rang'              => 'Rang',
            'rang_helper'       => '',
            'fictiv'            => 'Fictiv',
            'fictiv_helper'     => '',
            'region'            => 'Region',
            'region_helper'     => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'category'       => [
        'title'          => 'Category',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'added_by'           => 'Added By',
            'added_by_helper'    => '',
            'approved'           => 'Approved',
            'approved_helper'    => '',
            'approved_by'        => 'Approved By',
            'approved_by_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'subcategory'    => [
        'title'          => 'Subcategory',
        'title_singular' => 'Subcategory',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'category'           => 'Category',
            'category_helper'    => '',
            'approved'           => 'Approved',
            'approved_helper'    => '',
            'approved_by'        => 'Approved By',
            'approved_by_helper' => '',
            'added_by'           => 'Added By',
            'added_by_helper'    => '',
        ],
    ],
    'product'        => [
        'title'          => 'Product',
        'title_singular' => 'Product',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'slug'                => 'Slug',
            'slug_helper'         => '',
            'title'               => 'Title',
            'title_helper'        => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'price_starts'        => 'Price Starts',
            'price_starts_helper' => '',
            'price_ends'          => 'Price Ends',
            'price_ends_helper'   => '',
            'category'            => 'Category',
            'category_helper'     => '',
            'subcategory'         => 'Subcategory',
            'subcategory_helper'  => '',
            'region'              => 'Region',
            'region_helper'       => '',
            'place'               => 'Place',
            'place_helper'        => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => '',
            'created_by'          => 'Created By',
            'created_by_helper'   => '',
            'images'              => 'Images',
            'images_helper'       => '',
        ],
    ],
];