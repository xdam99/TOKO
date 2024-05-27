@extends('layouts.app')

@section('content')
    <section id="user">
        <!--Pour toutes les infos de l'utilisateur-->
        @foreach($infoUser as $u)
            <div>
            <!--Si la page de l'utilisateur est celui de la session connectée-->
            @if($u['id'] == $_SESSION['id'])
                <img class="PP-user" src="{{$u['avatar']}}">
                <form method="post" class="modifImg" action="index.php?action=modifImg" enctype="multipart/form-data">
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"><img src="./src/img/images_BLANC.png" width="50px"></i> 
                    </label>
                    <input id="file-upload" type="file" name="photo">
                    <input id="uploadFileUser" type="submit" class="confirmModifImg" value="Upload">
                </form>
            @else
            <!--Sinon, on n'affiche que la photo de l'utilisateur-->
                <img class="PP-user" src="{{$u['avatar']}}">
            @endif
                <h1 class="title-user">{{$u['pseudo']}}</h1>
            </div>
            <!--Si la page de l'utilisateur n'est pas celle de la session connectée-->
            @if($_SESSION['id'] != $_GET['id'])
                <!--Si la session n'est pas ami avec l'utilisateur-->
                @if($statut == NULL)
                    <form method="post" action="index.php?action=addFriend">
                        <input type="hidden" name="btnAddFriend" value="{{$_GET['id']}}">
                        <input id="btnAddFriendUser" type="submit" value="Ajouter en ami">
                    </form>
                @else
                    @foreach($statut as $s)
                        <!--Si la session est ami avec l'utilisateur-->
                        @if($s['etat'] == 'Ami') 
                            <p class="statut">ami</p>
                        @endif
                        <!--Si la session est en attente pour sa demande d'ami avec l'utilisateur-->
                        @if($s['etat'] == 'Attente')
                            <p class="statut">En attente</p>
                        @endif
                    @endforeach
                @endif
                    <h1 class="title-home">Publier sur le mur de {{$u['pseudo']}}</h1>
            @endif
        @endforeach
        <!--Si la page de l'utilisateur n'est pas celle de la session connectée-->
            @if($_SESSION['id'] != $_GET['id'])
            <!--Alors, on affiche un formulaire pour créer les posts-->
            <form id="create-post" action="index.php?action=addPublication" method="post" enctype="multipart/form-data">
                <input type="text" class="title-post" name="title" placeholder="Votre titre">
                <input type="text" maxlength="150" class="txt-post" name="txtPublication" placeholder="Qu'avez-vous de beau à nous dire aujourd'hui ?">
                <label for="searchFileHome" class="custom-file-upload-home">
                    <i class="fa fa-cloud-upload"></i> Mettre une image
                </label>
                <input type="file" id="searchFileHome" name="photo">
                <input type="hidden" name="profile-id" value="<?= $_GET['id'] ?>">
                <input class="btn-post" type="submit" value="Envoyer son post">
            </form>
            @endif
            @if($_SESSION['id'] == $_GET['id'])
                <h1 id="title-user">VOS PUBLICATIONS</h1>
            @else
                <h1 id="title-user">SES PUBLICATIONS</h1>
            @endif
        <div class="container-postUser">
            <!--Pour toutes les infos de l'utilisateur-->
            @foreach($postUser as $pu)
            <div class="publication-user-friend" data-aos="fade-bottom">
                <div>
                    <div class="user-margin">
                        @if($pu['idAuteur'] == $pu['idAmi'])
                            <a href="index.php?action=user&id={{$pu['idAuteur']}}" class="name-user-friend">{{$pu['auteur_pseudo']}}</a>
                        @else
                            <a href="index.php?action=user&id={{$pu['idAuteur']}}" class="name-user-friend">{{$pu['auteur_pseudo']}} -></a>
                            <a href="index.php?action=user&id={{$pu['idAmi']}}" class="name-user-friend">{{$pu['ami_pseudo']}}</a>
                        @endif
                    </div>
                    <h1 class="title-user-friend">{{$pu['titre']}}</h1>
                    <div class="txt-user-friend">
                        <hr class="bar-post">
                        <p class="p-user-friend">
                            {{$pu['contenu']}}
                            @if($pu['image'] != "0")
                                <img src="{{$pu['image']}}">                                
                            @endif
                        </p>
                    </div>
                </div>
                <div class="details-user-friend">
                    <p class="date_user-friend">Le {{$pu['dateEcrit']}}</p>
                @if($pu['idAuteur'] == $_SESSION['id'])
                    <form action="index.php?action=deletePost" method="post">
                        <input type="hidden" name="btnDeletePost" value="{{$pu['id']}}">
                        <input type="submit" class="btnDeletePost" value="Supprimer">
                    </form>
                @endif
                </div>
            </div>
            <hr class="bar-seperate">
            @endforeach
        </div>
    </section>
@endsection