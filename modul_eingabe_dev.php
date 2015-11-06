<?php

// textarea: 'bold,italic,stroke,ins,|,listbullet,listnumeric,|,linkintern,linkextern,linkmailto'

$values = array();
$values[1] = rex_var::toArray('REX_VALUE[1]');
$values[1]['media_1'] =<<<EOF
REX_MEDIA_BUTTON[1]
EOF;
$values[1]['medialist_1'] =<<<EOF
REX_MEDIALIST_BUTTON[1]
EOF;
$values[1]['link_1'] =<<<EOF
REX_LINK_BUTTON[1]
EOF;

$values[2] = rex_var::toArray('REX_VALUE[2]');
$values[2]['media_1'] =<<<EOF
REX_MEDIA_BUTTON[2]
EOF;
$values[2]['medialist_1'] =<<<EOF
REX_MEDIALIST_BUTTON[2]
EOF;
$values[2]['link_1'] =<<<EOF
REX_LINK_BUTTON[2]
EOF;

$values[3] = rex_var::toArray('REX_VALUE[3]');
$values[3]['media_1'] =<<<EOF
REX_MEDIA_BUTTON[3]
EOF;
$values[3]['medialist_1'] =<<<EOF
REX_MEDIALIST_BUTTON[2]
EOF;
$values[3]['link_1'] =<<<EOF
REX_LINK_BUTTON[3]
EOF;

$values[4] = rex_var::toArray('REX_VALUE[4]');
$values[4]['media_1'] =<<<EOF
REX_MEDIA_BUTTON[4]
EOF;
$values[4]['medialist_1'] =<<<EOF
REX_MEDIALIST_BUTTON[2]
EOF;
$values[4]['link_1'] =<<<EOF
REX_LINK_BUTTON[4]
EOF;

echo '
<input id="anrodnung" type="hidden" name="VALUE[19]" value="REX_VALUE[19]" />
<div id="tabs">
    <ul class="tabs">
';

      if('REX_VALUE[19]') {
        $reihenfolgeneu = explode(',','REX_VALUE[19]');

          for ($i = 1; $i <= count($values); $i++) {
              echo '<li id="'.($reihenfolgeneu[($i-1)]).'" class="tab'.($reihenfolgeneu[($i-1)]).'"><a href="#bereich'.($reihenfolgeneu[($i-1)]).'">Bereich '.$i.'</a></li>';
          }

        } else {
            for ($i = 1; $i <= count($values); $i++) {
              echo '<li id="'.$i.'" class="tab' . $i . '"><a href="#bereich' . $i . '">Bereich ' . $i . '</a></li>';
            }
         }



echo '
        <li class="weiteres locked" style="float:right;"><a href="#weiteres">Weitere Einstellungen</a></li>
    </ul>
  ';



 for ($i = 1; $i <= count($values); $i++) {

        $ueberschrift_art = new rex_select();
        $ueberschrift_art->setName('VALUE[' . $i . '][ueberschrift_art]');
        $ueberschrift_art->setSelected( (isset($values[$i]['ueberschrift_art']) ? $values[$i]['ueberschrift_art'] : '') );
        $ueberschrift_art->setSize(1);
        $ueberschrift_art->addOptions(
                array(
                     'h1' => 'Überschrift 1 (H1) - Nur einmal pro Seite verwenden',
                     'h2' => 'Überschrift 2 (H2)',
                     'h3' => 'Überschrift 3 (H3)',
                     'h4' => 'Überschrift 4 (H4)',
                    'faq' => 'FAQ Überschrift (Inhalt: Fliesstext)'
                ));

        $bildinformationen = new rex_select();
        $bildinformationen->setName('VALUE[' . $i . '][bildinformationen]');
        $bildinformationen->setSelected( (isset($values[$i]['bildinformationen']) ? $values[$i]['bildinformationen'] : '') );
        $bildinformationen->setSize(1);
        $bildinformationen->addOptions(
                array(
                     '' => 'nein',
                     'ja' => 'ja'
                ));

        $bildposition = new rex_select();
        $bildposition->setName('VALUE[' . $i . '][bildposition]');
        $bildposition->setSelected( (isset($values[$i]['bildposition']) ? $values[$i]['bildposition'] : '') );
        $bildposition->setSize(1);
        $bildposition->addOptions(
                array(
                  ''=>'über dem Text',
                  'unten'=>'unter dem Text',
                  'nachueberschrift'=>'unter der Überschrift',
                  'nachteaser'=>'unter dem Kurztext'
                ));


        $bildanpassen = new rex_select();
        $bildanpassen->setName('VALUE[' . $i . '][bildanpassen]');
        $bildanpassen->setSelected( (isset($values[$i]['bildanpassen']) ? $values[$i]['bildanpassen'] : '') );
        $bildanpassen->setSize(1);
        $bildanpassen->addOptions(
                array(
                     '' => 'nein',
                     'ja' => 'ja'
                ));

        $ueberschriftlink = new rex_select();
        $ueberschriftlink->setName('VALUE[' . $i . '][ueberschriftlink]');
        $ueberschriftlink->setSelected( (isset($values[$i]['ueberschriftlink']) ? $values[$i]['ueberschriftlink'] : '') );
        $ueberschriftlink->setSize(1);
        $ueberschriftlink->addOptions(
                array(
                     '' => 'nein',
                     'ja' => 'ja'
                ));

        echo '
<div id="bereich'.$i.'">
  <table class="output" >
    <tr><td class="headline" colspan="2" >Überschrift</td></tr>
    <tr><td class="abstand" colspan="2" ></td></tr>

    <tr>
      <td class="left ">Überschrift</td>
      <td class="right "><input name="VALUE[' . $i . '][ueberschrift]" value="' . (isset($values[$i]['ueberschrift']) ? $values[$i]['ueberschrift'] : '') . '" type="text" /></td>
    </tr>

    <tr>
      <td class="left ">Art der Überschrift</td>
      <td class="right "><div class="select-style">' . $ueberschrift_art->get() . '</div></td>
    </tr>

    <tr><td class="abstand" colspan="2" ></td></tr>
    <tr><td class="headline" colspan="2" >Inhaltstext</td></tr>
    <tr><td class="abstand" colspan="2" ></td></tr>

    <tr>
      <td class="left ">Teasertext</td>
      <td class="right "><textarea name="VALUE[' . $i . '][teasertext]" >' . (isset($values[$i]['teasertext']) ? $values[$i]['teasertext'] : '') . '</textarea></td>
    </tr>

    <tr>
      <td class="left ">Fließtext</td>
      <td class="right "><textarea name="VALUE[' . $i . '][text]" class="rex-markitup" data-buttonset="textarea">' . (isset($values[$i]['text']) ? $values[$i]['text'] : '') . '</textarea></td>
    </tr>


    <tr><td class="abstand" colspan="2" ></td></tr>
    <tr><td class="headline" colspan="2" >Bild</td></tr>
    <tr><td class="abstand" colspan="2" ></td></tr>

    <tr>
      <td class="left ">Datei</td>
      <td class="right ">' . $values[$i]['media_1'] . '</td>
    </tr>

    <tr>
      <td class="left">Alternativtext</td>
      <td class="right"><input name="VALUE[' . $i . '][alt]" value="' . (isset($values[$i]['alt']) ? $values[$i]['alt'] : '') . '" type="text" /></td>
    </tr>

    <tr>
      <td class="left">Bildinformation ausgeben</td>
      <td class="right"><div class="select-style">' . $bildinformationen->get() . '</div></td>
    </tr>

    <tr>
      <td class="left">Position</td>
      <td class="right"><div class="select-style">' . $bildposition->get() . '</div></td>
    </tr>

    <tr>
      <td class="left ">Bildanpassen</td>
      <td class="right "><div class="select-style">' . $bildanpassen->get() . '</div></td>
    </tr>

    <tr><td class="abstand" colspan="2" ></td></tr>
    <tr><td class="headline" colspan="2" >Link</td></tr>
    <tr><td class="abstand" colspan="2" ></td></tr>

    <tr>
      <td class="left ">extern (http://)</td>
      <td class="right "><input name="VALUE[' . $i . '][linkextern]" value="' . (isset($values[$i]['linkextern']) ? $values[$i]['linkextern'] : '') . '" type="text" /></td>
    </tr>

    <tr>
      <td class="left">Link intern</td>
      <td class="right">'.$values[$i]['link_1'].'</td>
    </tr>

    <tr>
      <td class="left">Bezeichnung</td>
      <td class="right"><input name="VALUE[' . $i . '][linkbezeichnung]" value="' . (isset($values[$i]['linkbezeichnung']) ? $values[$i]['linkbezeichnung'] : '') . '" type="text" /></td>
    </tr>

    <tr>
       <td class="left ">Überschrift verlinken</td>
       <td class="right "><div class="select-style">' . $ueberschriftlink->get() . '</div></td>
    </tr>

    <tr><td class="abstand" colspan="2" ></td></tr>
    <tr><td class="headline" colspan="2" >Download</td></tr>
    <tr><td class="abstand" colspan="2" ></td></tr>

    <tr>
      <td class="left  ">Dateien</td>
      <td class="right  ">'.$values[$i]['medialist_1'].'</td>
    </tr>
    <tr><td class="abstand" colspan="2" ></td></tr>



            </table>

        </div>';


    }



   $options = array(
            '12'      => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAQ9JREFUeNrs3TEKgzAYgNFagpuDBxC8/3HcBVcRXAQRQVJPYIcWapr3BpdAhh8+IoikiDE+gPw8jQDED4gfED8gfkD8gPgB8QPiB+4tXC8vy2JGkKiqqpz8gPgB8YP4AfED4gfED4gfED8gfkD8gPgB8QN/Gv84jsMwGCjkFf9xHH3fix8SEj7fYl3Xs/x9300TMoq/67p5ns0Rsou/ruuyLM/X/mmaTBMyir9pmvO5bZv4IS0+9YH4AfED4gfED/yR8J1dQmjb1jQhIUWM8WLZjT2QLjf2AOIHxA/iB8QPiB8QPyB+QPyA+AHxA+IHxA/czpu/+gAnPyB+QPyA+AHxA+IHxA+IHxA/8BMvAQYAX1c3Eu5IAT8AAAAASUVORK5CYII="/>',
            '6_6'     => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAgxJREFUeNrs3c1LInEYwPFNByl8icyLLMogXjr1L/T/gxcPZaJS3VJ8QaEXLd3f7sCyl929LLjM7/M5xGjQ4Zn5No+UeHI4HL4A8SkYAYgfED8gfkD8gPgB8QPiB8QP/N+SP397s9mYUZ5Uq1Wn2+l25wdrPyB+QPyA+AHxA+IHxA+IHxA/IH5A/ID4gaNJ/tUPen5+fn19TdPUTPPt/f19Pp9vt9tKpVKv1wsF94+44//8/ByPx+GCEH++zWazu7u7/X6fPTw7O7u+vj49PTWZSNf+l5eX29vbUL5p5ttutxsMBqH8TqcTmq/VamHXGw6HJhPpnb/f7y8WC3OMQdj2w4oXVv12u/390kmSXq+3XC5NJtL4Ly4uSqVSuCbCQmia+RbOctjzLy8vs4fZpzyGXwEmE2n8rVYrfH17exN/7n39ITv++PgYjUbhoNFomEyk8ROh1Wp1f38fXvCXy+Xw+t9AxE8UHh4eHh8fw87fbDa73W6xWDQT8ZN/k8nk6ekpBH91dWXhFz8Rbfuh/HCQpmmpVFqv19nztVrNcMRPnk2n0+xgPB7/+vzNzY3hxBt/kiT+ty/3zs/Pww3fHHLjJPtr7e/4CJec8Yk9TvdP3pUBkRI/iB8QPyB+QPyA+AHxA+IHxA+IHxA/IH7guP7yrj7AnR8QPyB+QPyA+AHxA+IHxA+IHziKbwIMAO4pnqqPCpuHAAAAAElFTkSuQmCC"/>',
            '4_4_4'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAvdJREFUeNrs3VtLomsYBuDRpJTMNtqOqYgKKhD6C/1/6CQiozRWUtDWon3ZZp7pgw4Wi1mjGTnMdR2En0EHd+/9vc9rG1Ovr6/fgL9PWgSg/IDyA8oPKD+g/IDyA8oPKD/Q3TK//vTV1ZWMftPAwIAkJfkHJWnnB2M/oPyA8gPKDyg/oPyA8gPKDyg/oPyA8gPKD3yBTKe+0NHR0d3d3ezsrEzb9vDwcHZ29vj4mM/nR0ZG0mm35jbd3t6en5+/vLwMDw9HmAL5xPI/Pz/XarVYtcrftpOTk0qlEus1uczlcisrK9lsVjKt2t/fj9X4/m40ExMTS0tLYvmUsT/uspubm9F8abat2WxubW1F8+fm5qLzhUIhxqjt7W3JtOr+/j6aH0PT8vJyuVzu6+s7PDw8PT2VTOd3/vX19UajIccPimk/pqcY9WdmZn5+VzKZtbW1GFwl06pYjbHnx24/Pj4el5eXl/V6/ebmplQqCafD5Y8zVW9vbyzcmFql+ZFzU8z5xWIxuUxG1rgFSKZVY2NjcQ9Noot5KrmBxjOS6Xz5p6enk1lL+T/i+5vk8dPTU7VajQc2q3YW9Jt48M+b5Mz/6/9m5cxPV7i4uIiBP4bV/v7+OP8LpG1DQ0OxM8VYGmf+5C5Ah3d+OijW6N7eXsz8k5OTCwsLPT09MmlVHO+vr6/z+fzQm8HBwY2NjYODAz+HsvN3r93d3Sh/Op0ul8uLi4ua3/boVKlU6vV6cplKpeLj+w9QsfN345JN1mtsUDGpxtifPF8oFITTkmKxWK1Wj4+PI7pcLler1eLJ0dFRySh/l4rFmjxIFuu71dVV4bQkm83Oz89HjDs7O8kzcQTw6sknlj+TyThTfUQcTWPDl0NHTE1NlUqlRqPRbDZj/4+TfzL88y+p99+C/E/eHeX3eZ8ZSf5ZSXrBD/5Syg/KDyg/oPyA8gPKDyg/oPyA8gPKDyg/oPzA1/qfv+oD7PyA8gPKDyg/oPyA8gPKDyg/oPzAl/ghwAAFHxBk8znuiwAAAABJRU5ErkJggg=="/>',
            '3_3_3_3' => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3FJREFUeNrs3dtLKlEYxuEUcbLMrKzpokIsIkHoJui2P737LgoL6STZCTpoiZnmdLCXWTJ0sWtDBO291u+5kJwg+Fzzzvq+nDLW7/eHALgnzksAEH4AhB8A4QdA+AEQfgCEHwDhB0D4AfzbEl9/++HhwcqyPc9LJpOffTcIgl6vZ2XhY2NjLDfLzc4P0PYDIPwACD8Awg+A8AMg/AAIPwDCD4DwAyD8AAg/AMIP4NckfuoHXV9fd7vdfD7vzmvXaDTa7XYikZiYmBgZGXGk6k6nc39///b2pqrT6bRTaVHV5+fn/X7fjvP8Z8L/+vparVaDIHAk/Kp3d3e32WxGR/Ih6wu/uLjQQkcf9DI7O7uysuJO+E9OThR+s9y0/YOtoFKpKPnunASnp6dKvva91dXVpaWlWCxWq9VarZbdVT89PSn58Xi8WCyWSiXP866urur1uiOLrn7HJJ+2f6BcLt/d3bk2LN3c3OhxeXk5k8mo+9VpoRFAj3pqcdVaaO352u1939dTXezOzs4eHx9zuZz1K/7y8nJwcDA6Oqp6Cf+ATv1kMqk2+Pb21p3wa6tPpVJR1E0brOHf7qpnZmYmJydNmc/Pz7rY6QsdcWHFDw8Pe73e2tra1tYW4R+Yn583DaFT4V9fX//YBWhL1OVgamrK7qoTIX1RC5mZ/+t/FGVNoyeFQkE7v0118Vbf96nfOT4+rlQqSr4m/+HhYUcKz2azuuir49PMb64CFtOGf3R0ND4+bvY5Zn4Mdbvdvb09TYDKvIZ/F7pfFdtut9PpdDakPOgVuLy8tPttjmazqRnHvL8THSyXy3Nzc//7ohP+79CYs7Ozoz1BrX6xWLR+2o9ioD3Q932VbH7xMRS+9e1C7brqfXyqQc/81pPwO2d/f1/J1wS4sLDQ6XTMQS9kcdW60mnM0fSbyWRSqVS1WtXB6elpu9faD0VPNzc39bixsUHb76IgCMztPWqDt7e3o+PW3+ejAWdxcVGZ1/5vjmgEKBQKnBJOh199rzs39n52d6fGYOtr16Cby+XU9GoM1v6vkk3z7w6bzvNYdKvmH/ERLpbhE3tY7ghv9QGOIvwA4QdA+AEQfgCEHwDhB0D4ARB+AIQfAOEHQPgBEH4Av+svf9UHgJ0fAOEHQPgBEH4AhB8A4QdA+AEQfgCEH8CveBdgACF2bQzem2woAAAAAElFTkSuQmCC"/>',
            '6_3_3'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAvtJREFUeNrs3W1LIlEYgGE1HdNqQktCF0UlhEAwoh/QT/cH6AcVVERT+xCYmG9TvmtPnV1ZWHI3dsHlzH19GHSDhaNzzzw6xTg3m40DgP24eAkA4gdA/ACIHwDxAyB+AMQPgPgBED+A/5t794/H4zGvkU5OTk5s+HZ7vV7DMD776Xw+n81mNny7OfMDjP0AiB8A8QMgfgDED4D4ARA/AOIHQPwAiB8A8QMgfgB74P5X/1Gn05lMJvF4nNdUb7PZrNfrzefz4+PjYDDoctni/LFer5+fny3L8vv9Z2dnBwcHxP/darVqNBqyQxC/3rrdbqVSkRLUU5/Pl8lkDg8P9V617NiFQuHl5UU9NQwjnU6bpsnY73h9fS2Xy/IC0YbeFotFtVqV8pPJpDQve7/MerVaTfuFN5tNKT8UCl1fX0ciEdnV9Vj13575i8WijEOEYQcy7cuIJ6N+LBZ733Xc7nw+3+/37bBw2aZSKY/HI4e8x8fH7RRg6/gDgYBMQbJPyEBIHnqTd1nmfPnEq56quzzKIUD7hd/c3MhWypft09OTbOUISPyOaDQq2+l0Svza+/ZBPV4ul/V6XR6cn59rv/DtlxrZbFYdBRKJhAbr4lIfvmwwGMjAPxqNjo6O5PO/fRYej8dl8FksFqVSSYMvudzsyviSVqvVbrdl5g+Hw5eXl3pc9Nqt0+nI9uLiQl3MyuVylmXJqLudg4gf+ru/v394eJDgr66u7DDwK/IBR872pmn6fD556nQ6HR9X/hn7YaNpX8pX069hGKMftF+4OsxVq9V+v99sNsfjsfSvwbGPMz/+lPqiWzQajZ///e7uTu+FJxIJOcYNh8NCoaDO/PJ5R00BxP9+vYff7dPe6enpjltfaExWfXt7q369Vx4Hg0Gv16vBupzqau1nuGOPZrhjz6+4Yw8AeyF+gPgBED8A4gdA/ACIHwDxAyB+AMQPgPgBED8A4gewX7/5qz4AnPkBED8A4gdA/ACIHwDxAyB+AMQPgPgB7MWbAAMARkEV6b+++m4AAAAASUVORK5CYII="/>',
            '3_6_3'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAvRJREFUeNrs3WtLIlEcgHFdbbykYl4IkmQEEQRBCaGv7wcQvCIRifpGMPF+Gccw97+eRXpRuxALW2ee34uhLVgY5zxzzmnc1X08Hl0AnOcHLwFA/ACIHwDxAyB+AMQPgPgBED8A4gfwtXn//OPVaqXlaft8PsMwPvrpfr+3bZvBweX+7sLhMDM/AOIHQPwA8QMgfgDED4D4ARA/AOIHQPwAiB8A8QMgfgBfi/df/UWj0ciyLNM0nfPaTSaT9Xrt9Xqvrq6CwSCDSWOvr6/T6VQut1zoeDzu8XiI/7fD4dDtdvf7vUPil/NttVrz+fz8HfOESLQkA7vRaGw2G/VHwzAKhUIkEmHZ79put51OR14g54yGwWAg5YdCoWKxmM1m3W53v99fLpd0oqVeryflJ5PJUql0c3MjQ/3x8ZGZ39VsNmU55LTR8Pz8LMdcLie3f1nzz2Yz2QLIUYPZAO/u79Tlvri4kEs8HA7PqwBHxy9DX1ZBsgwej8fOGQ0y1QcCgXPq6vMOZfNPJ1q6u7uTo5R/vu/HYjHid93e3spxt9s5Kv77+/u3qwBZ+8jtIB6P04mW/H6/+qJSqai7QCaT0eC8eNT3ebLeeXp66nQ6Ur7s/M9DBLoyTVNu8S8vL61WS4NfcrFS/STLstrttuz9pHnZDeqxDsS7RqORHK+vr9UDnWq1ul6vZambSqWI33Fkm1Ov123blnkgn8+z29ebrO9kto9EIoFAwHX6jY/r9OSfZb8TPTw8SPmXl5fpdHq73S5P+N++dZVIJNRFn81mvV5vtVpJ/+qbzPzOIps99fYeWfPXarW3G0Le56OlTCYjN/fFYtFoNNTMn81m1SqA+H895XLOuD8ej++ebDQapRMtGYZRLpfV23vl61gs5vP5NDgvt3pG/RE+sQdc7u+LT+wBQPwAiB8gfgDED4D4ARA/AOIHQPwAiB8A8QMgfgDED+DL+cu/6gPAzA+A+AEQPwDiB0D8AIgfAPEDIH4AxA/gv/gpwAAthiJ8l+WEIQAAAABJRU5ErkJggg=="/>',
            '3_3_6'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAwRJREFUeNrs3V9LInEUxvFVBifNzNTMCw2pCAPBG6H3/woUCw1KUCkoK5M0/4ykPTgge9G2Nwu1c76fC9ERgjMzz5zfoakJrVarXwDsCbMLAMIPgPADIPwACD8Awg+A8AMg/AAIP4Cfzfn669FoFMiyXdeNRCJ/+tbzvPl8HsjCd3Z2DB5us74+3HR+gGU/AMIPgPADIPwACD8Awg+A8AMg/AAIPwDCD4DwAyD8AL6B869+0MPDw3Q6LRaLdvbd8/PzeDx2HGdvby8WixmpejKZvLy8LJdLVR2Px4mQ9fC/v7+3223P84yEX/VeXFwMh8PNluJa4Au/vb3Vgd486CWXy5VKJVJkd9mvVtBsNpV8O3ut2+0q+ep7lUrl5OQkFAp1Op3X19dgVz2bzZT8cDh8dnZWLpdd172/v396eiJFRjt/o9EYDAbW9lq/39fr6elpIpHQ6lfLYI0AetXHAFetA62er25/cHCgj7rY9Xq9t7e3TCZDkCyGX6d+JBLRMvjx8dHOXlOrj0ajm6j7y2AN/8GuOpvNplIpv8zFYqGLnd5oCykyGv5CoeAvCE2F//z8/PdVgFqiLgfpdDrg58qa3nTW/Jn/638UhYDP/GZpvXNzc9NsNpV8Tf5bW1tGCk8mk7roa8Wnmd+/CsBi5zdrOp1eXl5q4lXmNfxbWP2q2PF4HI/Hk2u7u7vaA3d3d6Z+v0vnt05jTr1eVxi01K9Wq0bm3uFw2Gq1er2e/1HrHb0ul0vOBzq/IVdXV/P5fHt7+/DwcDKZ+BvdtQBXrSudxpx+v59IJKLRaLvd1sb9/X3OB8Jvhed5/u096vy1Wm2zPfD3+WjAOT4+Vuavr6/9LRoBjo6OOCVMh99xHDuD32q1+rRYjcGBrz2fz2cymcFgsFgs1P9Vsr/4x/8otLlV81M8sSdgeGKPKTyxBwDhB0D4AcIPgPADIPwACD8Awg+A8AMg/AAIPwDCD4DwA/hx/vJXfQDo/AAIPwDCD4DwAyD8AAg/AMIPgPADIPwAvsWHAAMARlAaCQUVROkAAAAASUVORK5CYII="/>',
            '8_4'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAg1JREFUeNrs3c9LInEYwOFNB0k0I+siiyLipVP/Qv8/dPGgJY6oNxVLErS0cr+7c9nL/jiYI/k8BxkVOrzMp3mlZE622+034PhkjADED4gfED8gfkD8gPgB8QPiBw5b9Pe3F4uFGbFnZ2dnzsk9TNKVH6z9gPgB8QPiB8QPiB8QPyB+QPyA+AHxA+IHUhDt6geNx+PValWv182U1L2+vs5ms/V6XSwWy+VyJuMi92nxv7+/x3EcZi1+UjedTjudzsfHR/I0n8/f3Nycnp6azO7X/uVy2W63Q/mmSeo2m839/X0ov9FohOZLpVJYSLvdrsns/srfarUeHx/NkQMRtv2wh4ZVv1ar/Ty/o+ju7u7p6clkdh//xcVFLpcL4w67lmmSunAqhj3/8vIyeZrcijL8CjCZ3cdfrVbD48vLi/g5BN9/SY7f3t56vV44uLq6Mpndxw+HaT6fPzw8hA/8hUIhfP43EPFzFAaDwXA4DDt/pVJpNpvZbNZMxM/X1+/3R6NRCP76+trCL36OaNsP5YeDer2ey+Wen5+T10ulkuGIn69sMpkkB3Ec//767e2t4XxK/FEU+d8+DsH5+Xm44JvD/zhJ/hD6J+6Owv65Y89+JukLD3CkxA/iB8QPiB8QPyB+QPyA+AHxA+IHxA+IH0jXP77VB7jyA+IHxA+IHxA/IH5A/ID4AfEDqfghwAD6BZ6qshTg0AAAAABJRU5ErkJggg=="/>',
            '4_8'   => '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAVQAAAA8CAIAAAC2INVhAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAhBJREFUeNrs3U9LInEcwOFNBzEypfIiizKEl069Bd8/ePFgJY1YtxQ1Evrj3/3tzmUvuxsZ25TPc4jRoMO3+ThfKZm9zWbzDdg9OSMA8QPiB8QPiB8QPyB+QPyA+IFsi/7+7dlsZkavdHh4aJJ8onPSlR+s/YD4AfED4gfED4gfED8gfkD8gPgB8QPiBz5A9F4/6O7u7unpKY5jM32zl5eX8Xg8n89LpdLx8XEu56WZzMe/Wq2SJAlnrfjfbDQaXVxcrNfr9OH+/v75+XmxWDQZsrv2Pz4+drvdUL5pvtlisbi8vAzln56ehubL5XJYo3q9nsmQ3St/p9OZTCbmuKWw7YftKaz6jUbj528litrt9nQ6NRmyG//R0VGhUAgnbthaTXOb901hzz85OUkfpjdQDC8BJkN246/X6+Hr8/Oz+Lfx/Zf0eLlcXl9fh4NqtWoyZDd+3tf9/f3V1VV4w39wcBDe/xsI4t8Jg8Hg5uYm7Py1Wq3ZbObzeTNB/F9fv9+/vb0NwZ+dnVn4Ef8Obfuh/HAQx3GhUHh4eEifL5fLhoP4v7LhcJgeJEny+/OtVstwyHT8URT5375tVCqVcME3B/6nvfRPyn/iPjOv5449fK5z0kdHYEeJH8QPiB8QPyB+QPyA+AHxA+IHxA+IHxA/8LH+8ak+wJUfED8gfkD8gPgB8QPiB8QPiB/4ED8EGADiTZ6qytwGIAAAAABJRU5ErkJggg=="/>'


        );

      $grid = '';
    foreach ($options as $value => $label) {
         $checked = 'REX_VALUE[20]' == $value ? ' checked="checked"' : '';
       $grid .= '<label><input name="VALUE[20]" value="' . $value . '" type="radio"' . $checked .' />' . $label . '</label>';
    }

echo '
        <div id="weiteres">
          <div class="grid">
          '.$grid.'
          </div>
          Individuelle CSS Klasse <input type=text name=VALUE[18] value="REX_VALUE[18]"><br/>
          Image Manager Typ <input type=text name=VALUE[17] value="REX_VALUE[17]">

        </div>
';


?>

<script type="text/javascript">
jQuery('#tabs').tabs({
  fx: { height: 'toggle', duration: 200 },
  select: function(event, ui) {
    jQuery(this).next().css('height', jQuery(this).height()+10);
  },
//  show: function(event, ui) {
//    jQuery(this).css('height', '550px');
//    jQuery(this).css('overflow', 'visible');
//  }
});


  jQuery(document).ready(function($) {

$(function () {
    $("#tabs").tabs().find("ul.tabs").sortable({
        axis : "x",
        items: '> li:not(.locked)',
        update: function (e, ui) {
              var csv = "";
             $("#tabs > ul > li").each(function(i){
                  csv+= ( csv == "" ? "" : "," )+this.id;
             });
             // alert(csv);
              $( "#anrodnung" ).val( csv );
        }
    });
});


    if('REX_VALUE[20]' == '') {
      $('.weiteres a').click();
    }

     function grid(str) {

            if (str == '12') {
                 $('.tab1').css('display','block');
                 $('.tab2').css('display','none');
                 $('.tab3').css('display','none');
                 $('.tab4').css('display','none');
            } else if (str == '6_6' || str == '8_4' || str == '4_8') {
                 $('.tab1').css('display','block');
                 $('.tab2').css('display','block');
                 $('.tab3').css('display','none');
                 $('.tab4').css('display','none');
           } else if (str == '4_4_4' || str == '6_3_3' || str == '3_6_3' || str == '3_3_6') {
                 $('.tab1').css('display','block');
                 $('.tab2').css('display','block');
                 $('.tab3').css('display','block');
                 $('.tab4').css('display','none');
            } else {
                 $('.tab1').css('display','block');
                 $('.tab2').css('display','block');
                 $('.tab3').css('display','block');
                 $('.tab4').css('display','block');
               }
    }

    grid('REX_VALUE[20]');

    $( '.grid input[type=radio]').change(function() {
        $('.tab1 a').click();
        grid(this.value);
    });




  });



</script>

<style>

.grid input {
 visibility:hidden !important;
}

.grid label img {
  border: 1px solid #ccc;
  margin: 5px;
}

.grid label:hover img{
  cursor:pointer;
  border: 1px solid #659CCE;
}

.grid :checked + img {
    border: 1px solid #737373;
}

table.output {
  width: 100%;
  font-size: 14px;
}

td.headline {
  background: #E7E7E7;
  padding: 8px 0 5px 170px;
  font-weight: bold;
  font-size: 12px;
  border-top: 15px solid #fff;
  border-bottom: 1px solid #fff;

}

td.abstand {
  background: #F0F0F0;
  padding: 5px;

}

.left {
  background: #F0F0F0;
  padding: 6px 0 10px 10px;
  font-weight: bold;
  width: 160px;
  font-size: 12px;
  vertical-align: top;
}

.right {
  background: #F0F0F0;
}

input[type=text] {
  width: 490px;
  padding: 5px 8px;
  border: 1px solid #E7E7E7;
}

textarea {
  width: 490px;
  height: 70px;
  padding: 5px 8px;
  resize: none;
  border: 1px solid #E7E7E7;
}

.markItUp {
  width: 505px;

  resize: none;
  border: 1px solid #E7E7E7;
}

.markItUpContainer {
  border: none;
}

.markItUp textarea {
  font-family: arial;
  font-size: 14px;
  resize: auto;
  padding: 10px 8px !important;
}

.select-style {
    border: 1px solid #E7E7E7;
    width: 506px;
    overflow: hidden;
    background: #fff url("data:image/png;base64,R0lGODlhDwAUAIABAAAAAP///yH5BAEAAAEALAAAAAAPABQAAAIXjI+py+0Po5wH2HsXzmw//lHiSJZmUAAAOw==") no-repeat 480px 50%;
    margin-bottom: 6px;
}

.select-style select {
    padding: 5px 8px;
    width:100%;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
    -webkit-border-radius: 0px;
}

.select-style select:focus {
    outline: none;
}

.select-style select:hover {
  cursor: pointer;
}


.rex-widget {
    border: 1px solid #E7E7E7 !important;
    margin-bottom: 5px !important;
}

.rex-widget-media,
.rex-widget-link,
.rex-widget-medialist {
  width: 495px;
}

.rex-widget-media input {
  background: #fff !important;
  width: 380px;
}

.rex-widget-link input {
  background: #fff !important;
  width: 420px;
}

.rex-widget-medialist .rex-widget-field select{
    background: #fff !important;
    width: 438px !important;
    border: 1px solid #E7E7E7 !important;
}


.rex-widget-icons {
  margin-top: 5px;
}



</style>


