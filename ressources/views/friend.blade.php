@extends('layouts.app')

@section('content')
    <section id="friend">
    <div id="add-friend">    
        <h1 id="title-friend">AJOUTER DES UTILISATEURS</h1>
        <form id="search-friend" method="post" action="index.php?action=search">
            <input type="text" name="txtSearch" placeholder="Nom de l'utilisateur">
            <input type="submit" value="Rechercher">
        </form>
        <!--Résultat de recherche-->
        @if(!$search)
        @else
        <div class="allUser">
        @foreach($search as $s)
            <div class="userFriend">
                <img class="PP-user-friend" src="{{$s['avatar']}}">
                <div>
                    <a href="index.php?action=user&id={{$s['id']}}"><h1>{{$s['pseudo']}}</h1></a>
                </div>
            </div>
        @endforeach
        </div>
        @endif
        <!--Demandes d'ami-->
        @if(!$askFriend)
        @else
        <div id="allInvite">
            <h1 id="title-invite">UTILISATEURS EN ATTENTE</h1>
            @foreach($askFriend as $af)
                @if($af['etat'] == 'Attente')
                    <?php $pasAmi = false; ?>
                    <div class="invite">
                        <img src="{{$af['avatar']}}">
                        <div>
                            <h1>{{$af['pseudo']}}</h1>
                            <div>
                                <form method="post" action="index.php?action=acceptFriend">
                                    <input type="hidden" name="btnAddFriend" value="{{$af['id_lien']}}">
                                    <button id="btnAddFriend" type="submit"><img src="./src/img/check_blanc.png" width="30px" heigth="30px"></button>
                                </form>
                                <form method="post" action="index.php?action=declineFriend">
                                    <input type="hidden" name="btnDeclineFriend" value="{{$af['id_lien']}}">
                                    <button id="btnDeclineFriend" type="submit"><img src="./src/img/cross_blanc.png" width="25px" heigth="25px"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <?php $pasAmi = true; ?>
                    
                @endif
            @endforeach
            @if($pasAmi == true)
                <h2>Vous n'avez pas de demande d'ami, je suis triste pour vous...</h2>
            @endif
        </div>
        @endif
        <!---->
        @if(!$askFriend)
        @else
        <div id="allFriend">
            <h1 id="title-allFriend">VOS AMIS</h1>
            @foreach($askFriend as $af)
                @if($af['etat'] == 'Ami')
                    <div class="invite">
                        <img src="{{$af['avatar']}}">
                        <div>
                            <h1>{{$af['pseudo']}}</h1>
                            <div>
                                <form method="post" action="index.php?action=declineFriend">
                                    <input type="hidden" name="btnDeclineFriend" value="{{$af['id_lien']}}">
                                    <button id="btnDeclineFriend" type="submit"><img src="./src/img/cross_blanc.png" width="25px" heigth="25px"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        @endif
    </div>
    </section>
@endsection