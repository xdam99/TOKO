@extends('layouts.app')

@section('content')
    <section id="home-post" class="divDarkMode">
        <h1 class="title-home">Créer votre publication</h1>
        <form id="create-post" action="index.php?action=addPublication" method="post" enctype="multipart/form-data">
            <input type="text" class="title-post" name="title" placeholder="Votre titre">
            <input type="text" maxlength="150" class="txt-post" name="txtPublication" placeholder="Qu'avez-vous de beau à nous dire aujourd'hui ?">
            <label for="searchFileHome" class="custom-file-upload-home">
                <i class="fa fa-cloud-upload"><img src="./src/img/images_BLANC.png" width="50px"></i> 
            </label>
            <input type="hidden" name="profile-id" value="<?= $_SESSION['id'] ?>">
            <input type="file" id="searchFileHome" name="photo">
            <input class="btn-post" type="submit" value="Envoyer son post">
        </form>
        <p id="error-post"></p>
        <div class="all-post">
            <h1 class="title-home">Publications de vos amis</h1>
            @foreach($post as $p)
                    <div class="publication-user-friend" data-aos="fade-bottom">
                        <div class="user-friend">
                            <div>
                                @if($p['idAuteur'] == $p['idAmi'])
                                    <img class="PP-user-friend" src="{{$p['avatar']}}">
                                    <a href="index.php?action=user&id={{$p['idAuteur']}}" class="name-user-friend">{{$p['auteur_pseudo']}}</a>
                                @else
                                    <img class="PP-user-friend" src="{{$p['auteur_avatar']}}">
                                    <a href="index.php?action=user&id={{$p['idAuteur']}}" class="name-user-friend">{{$p['auteur_pseudo']}} -></a>
                                    <a href="index.php?action=user&id={{$p['idAmi']}}" class="name-user-friend">{{$p['ami_pseudo']}}</a>
                                @endif
                                <hr class="bar-user">
                            </div>
                        </div>
                        <div>
                            <h1 class="title-user-friend">{{$p['titre']}}</h1>
                            <div class="txt-user-friend">
                                <hr class="bar-post">
                                <p class="p-user-friend">
                                    {{$p['contenu']}}
                                    @if($p['image'] != "0")
                                        <img src="{{$p['image']}}">                                
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="details-user-friend">
                            <p class="date_user-friend">Le {{$p['dateEcrit']}}</p>
                        @if($p['idAuteur'] == $_SESSION['id'])
                            <form action="index.php?action=deletePost" method="post">
                                <input type="hidden" name="btnDeletePost" value="{{$p['ecrit_id']}}">
                                <input type="submit" class="btnDeletePost" value="Supprimer">
                            </form>
                        @endif
                            <form method="post" action="index.php?action=addLike">
                                <input type="hidden" name="like" value="{{$p['ecrit_id']}}">
                                <input class="aimer" type="submit" value="Like">
                            </form>
                        </div>
                    </div>
                    <hr class="bar-seperate">
            @endforeach
        </div>
    </section>
@endsection