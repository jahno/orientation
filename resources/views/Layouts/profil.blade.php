<?php
/**
 * Created by PhpStorm.
 * User: Stagiaire-Boah
 * Date: 18/10/2017
 * Time: 10:16
 */
?>

@extends('Layouts.app')

@push('contenu_profil')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                {{-- Style Appliqué à L'image --}}
                <style>
                    #img_profile{
                        width:150px;
                        height:150px;
                        float:left;
                        border-radius:50%;
                        margin-right:25px;
                    }
                </style>
                {{-- Style Appliqué à L'image --}}
                <img data-toggle="modal" data-target=".bs-example-modal-sm" id="img_profile" src="avatars/{{$user->avatar}}" alt=""/>
            </div>
            <div class="col-md-8">
                <h3>Bonjour <strong>{{$user->name}}</strong> Nous sommes Ravis De vous revoir ♥</h3>

                {{-- modal Upload --}}
            <!-- Small modal -->

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="container">
                             {{-- Content --}}
                            <form action="/profil" enctype="multipart/form-data" method="post">
                                <br>
                                <label class="control-label" for="">Mettre à Jour Votre Image de Profil</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"><br>
                                <input type="submit" class="btn btn-sm btn-primary"> <br><br>
                            </form>
                             {{-- Content --}}
                            </div>
                        </div>
                    </div>
                </div>
                {{-- modal Upload --}}
                {{-- --}}

            </div>
        </div>
    </div>


@endpush