<?php

namespace Database\Seeders;

use App\Models\Uf;
use Illuminate\Database\Seeder;

class UfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ac = new Uf();
        $ac->sigla =  'AC';
        $ac->save();

        $al = new Uf();
        $al->sigla =  'AL';
        $al->save();

        $ap = new Uf();
        $ap->sigla =  'AP';
        $ap->save();

        $am = new Uf();
        $am->sigla = 'AM';
        $am->save();

        $ba = new Uf();
        $ba->sigla =  'BA';
        $ba->save();

        $ce = new Uf();
        $ce->sigla =  'CE';
        $ce->save();

        $df = new Uf();
        $df->sigla =  'DF';
        $df->save();

        $es = new Uf();
        $es->sigla =  'ES';
        $es->save();

        $go = new Uf();
        $go->sigla =  'GO';
        $go->save();

        $ma = new Uf();
        $ma->sigla =  'MA';
        $ma->save();

        $mt = new Uf();
        $mt->sigla =  'MT';
        $mt->save();

        $ms = new Uf();
        $ms->sigla =  'MS';
        $ms->save();

        $mg = new Uf();
        $mg->sigla =  'MG';
        $mg->save();

        $pa = new Uf();
        $pa->sigla =  'PA';
        $pa->save();

        $pb = new Uf();
        $pb->sigla =  'PB';
        $pb->save();

        $pr = new Uf();
        $pr->sigla =  'PR';
        $pr->save();

        $pe = new Uf();
        $pe->sigla =  'PE';
        $pe->save();

        $pi = new Uf();
        $pi->sigla =  'PI';
        $pi->save();

        $rj = new Uf();
        $rj->sigla =  'RJ';
        $rj->save();

        $rn = new Uf();
        $rn->sigla =  'RN';
        $rn->save();

        $rs = new Uf();
        $rs->sigla =  'RS';
        $rs->save();

        $ro = new Uf();
        $ro->sigla =  'RO';
        $ro->save();

        $rr = new Uf();
        $rr->sigla =  'RR';
        $rr->save();

        $sc = new Uf();
        $sc->sigla =  'SC';
        $sc->save();

        $sp = new Uf();
        $sp->sigla =  'SP';
        $sp->save();

        $se = new Uf();
        $se->sigla =  'SE';
        $se->save();

        $to = new Uf();
        $to->sigla =  'TO';
        $to->save();
    }
}
