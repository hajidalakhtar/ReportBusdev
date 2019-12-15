@php
$SUBMIT_PROPOSAL_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SUBMIT PROPOSAL'");
$SUBMIT_PROPOSAL_jkt_1 = Count($SUBMIT_PROPOSAL_jkt_1);
$SUBMIT_PROPOSAL_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SUBMIT PROPOSAL'");
$SUBMIT_PROPOSAL_jkt_2 = Count($SUBMIT_PROPOSAL_jkt_2);
$SUBMIT_PROPOSAL_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SUBMIT PROPOSAL'");
$SUBMIT_PROPOSAL_jkt_3 = Count($SUBMIT_PROPOSAL_jkt_3);
$SUBMIT_PROPOSAL_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SUBMIT PROPOSAL'");
$SUBMIT_PROPOSAL_semarang = Count($SUBMIT_PROPOSAL_semarang);
$SUBMIT_PROPOSAL_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SUBMIT PROPOSAL'");
$SUBMIT_PROPOSAL_surabaya = Count($SUBMIT_PROPOSAL_surabaya);

$NEGOTIATION_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 1 - BUSINESS SCHEME'");
$NEGOTIATION_jkt_1 = Count($NEGOTIATION_jkt_1);
$NEGOTIATION_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 1 - BUSINESS SCHEME'");
$NEGOTIATION_jkt_2 = Count($NEGOTIATION_jkt_2);
$NEGOTIATION_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 1 - BUSINESS SCHEME'");
$NEGOTIATION_jkt_3 = Count($NEGOTIATION_jkt_3);
$NEGOTIATION_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 1 - BUSINESS SCHEME'");
$NEGOTIATION_semarang = Count($NEGOTIATION_semarang);
$NEGOTIATION_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION 1 - BUSINESS SCHEME'");
$NEGOTIATION_surabaya = Count($NEGOTIATION_surabaya);

$site_survey_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE
SURVEY'");
$site_survey_jkt_1 = Count($site_survey_jkt_1);
$site_survey_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE
SURVEY'");
$site_survey_jkt_2 = Count($site_survey_jkt_2);
$site_survey_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE
SURVEY'");
$site_survey_jkt_3 = Count($site_survey_jkt_3);
$site_survey_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE
SURVEY'");
$site_survey_semarang = Count($site_survey_semarang);
$site_survey_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SITE
SURVEY'");
$site_survey_surabaya = Count($site_survey_surabaya);

$boq_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE
SURVEY REPORT, DESIGN'");
$boq_jkt_1 = Count($boq_jkt_1);
$boq_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE
SURVEY REPORT, DESIGN'");
$boq_jkt_2 = Count($boq_jkt_2);
$boq_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE
SURVEY REPORT, DESIGN'");
$boq_jkt_3 = Count($boq_jkt_3);
$boq_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE
SURVEY REPORT, DESIGN'");
$boq_semarang = Count($boq_semarang);
$boq_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'BOQ, SITE
SURVEY REPORT, DESIGN'");
$boq_surabaya = Count($boq_surabaya);

$pnl_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL
PROGRESS'");
$pnl_jkt_1 = Count($pnl_jkt_1);
$pnl_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL
PROGRESS'");
$pnl_jkt_2 = Count($pnl_jkt_2);
$pnl_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL
PROGRESS'");
$pnl_jkt_3 = Count($pnl_jkt_3);
$pnl_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL
PROGRESS'");
$pnl_semarang = Count($pnl_semarang);
$pnl_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'PnL
PROGRESS'");
$pnl_surabaya = Count($pnl_surabaya);

$pks_review_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION
2 - PKS REVIEW'");
$pks_review_jkt_1 = Count($pks_review_jkt_1);
$pks_review_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION
2 - PKS REVIEW'");
$pks_review_jkt_2 = Count($pks_review_jkt_2);
$pks_review_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION
2 - PKS REVIEW'");
$pks_review_jkt_3 = Count($pks_review_jkt_3);
$pks_review_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION
2 - PKS REVIEW'");
$pks_review_semarang = Count($pks_review_semarang);
$pks_review_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'NEGOTIATION
2 - PKS REVIEW'");
$pks_review_surabaya = Count($pks_review_surabaya);

$SIGNED_PKS_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'SIGNED
PKS'");
$SIGNED_PKS_jkt_1 = Count($SIGNED_PKS_jkt_1);
$SIGNED_PKS_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'SIGNED
PKS'");
$SIGNED_PKS_jkt_2 = Count($SIGNED_PKS_jkt_2);
$SIGNED_PKS_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'SIGNED
PKS'");
$SIGNED_PKS_jkt_3 = Count($SIGNED_PKS_jkt_3);
$SIGNED_PKS_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'SIGNED
PKS'");
$SIGNED_PKS_semarang = Count($SIGNED_PKS_semarang);
$SIGNED_PKS_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'SIGNED
PKS'");
$SIGNED_PKS_surabaya = Count($SIGNED_PKS_surabaya);

$roll_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT
PROGRESS'");
$roll_jkt_1 = Count($roll_jkt_1);
$roll_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT
PROGRESS'");
$roll_jkt_2 = Count($roll_jkt_2);
$roll_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT
PROGRESS'");
$roll_jkt_3 = Count($roll_jkt_3);
$roll_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT
PROGRESS'");
$roll_semarang = Count($roll_semarang);
$roll_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'ROLL-OUT
PROGRESS'");
$roll_surabaya = Count($roll_surabaya);

$ready_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_jkt_1 = Count($ready_jkt_1);
$ready_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_jkt_2 = Count($ready_jkt_2);
$ready_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_jkt_3 = Count($ready_jkt_3);
$ready_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_semarang = Count($ready_semarang);
$ready_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$ready_surabaya = Count($ready_surabaya);

$reject_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$reject_jkt_1 = Count($reject_jkt_1);
$reject_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$reject_jkt_2 = Count($reject_jkt_2);
$reject_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$reject_jkt_3 = Count($reject_jkt_3);
$reject_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$reject_semarang = Count($reject_semarang);
$reject_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
SELL'");
$reject_surabaya = Count($reject_surabaya);
//

$ready_office_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
`wilayah_kodes`.`nama_wilayah` where
`wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Office
Building'");
if ($ready_office_jkt_1 == []) {
$ready_office_jkt_1 = 0;
}else{
$hasil = 0;
for ($i=0; $i < Count($ready_office_jkt_1) ; $i++) { $hasil=$ready_office_jkt_1[$i]->HP_PORT + $hasil;
  }
  $ready_office_jkt_1 = $hasil;
  // dd($ready_office_jkt_1);
  };
  $ready_office_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
  `wilayah_kodes`.`nama_wilayah` where
  `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Office
  Building'");
  if ($ready_office_jkt_2 == []) {
  $ready_office_jkt_2 = 0;
  }else{
  $hasil = 0;
  for ($i=0; $i < Count($ready_office_jkt_2) ; $i++) { $hasil=$ready_office_jkt_2[$i]->HP_PORT + $hasil;
    }
    $ready_office_jkt_2 = $hasil;
    };
    $ready_office_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
    `wilayah_kodes`.`nama_wilayah` where
    `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Office
    Building'");
    if ($ready_office_jkt_3 == []) {
    $ready_office_jkt_3 = 0;
    }else{
    $hasil = 0;
    for ($i=0; $i < Count($ready_office_jkt_3) ; $i++) { $hasil=$ready_office_jkt_3[$i]->HP_PORT + $hasil;
      }
      $ready_office_jkt_3 = $hasil;
      };
      $ready_office_semarang = \DB::select("
      select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
      `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
      'Office
      Building'");
      if ($ready_office_semarang == []) {
      $ready_office_semarang = 0;
      }else{
      $hasil = 0;
      for ($i=0; $i < Count($ready_office_semarang) ; $i++) { $hasil=$ready_office_semarang[$i]->HP_PORT + $hasil;
        }
        $ready_office_semarang = $hasil;
        };
        $ready_office_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
        `wilayah_kodes`.`nama_wilayah` where
        `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
        'Office
        Building'");
        if ($ready_office_surabaya == []) {
        $ready_office_surabaya = 0;
        }else{
        $hasil = 0;
        for ($i=0; $i < Count($ready_office_surabaya) ; $i++) { $hasil=$ready_office_surabaya[$i]->HP_PORT + $hasil;
          }
          $ready_office_surabaya = $hasil;
          };

          $ready_apartemen_jkt_1 = \DB::select("
          select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah`
          where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Apartemen'");
          if ($ready_apartemen_jkt_1 == []) {
          $ready_apartemen_jkt_1 = 0;
          }else{
          $hasil = 0;
          for ($i=0; $i < Count($ready_apartemen_jkt_1) ; $i++) { $hasil=$ready_apartemen_jkt_1[$i]->HP_PORT + $hasil;
            }
            $ready_apartemen_jkt_1 = $hasil;
            };

            $ready_apartemen_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Apartemen'");
            if ($ready_apartemen_jkt_2 == []) {
            $ready_apartemen_jkt_2 = 0;
            }else{
            $hasil = 0;
            for ($i=0; $i < Count($ready_apartemen_jkt_2) ; $i++) { $hasil=$ready_apartemen_jkt_2[$i]->HP_PORT + $hasil;
              }
              $ready_apartemen_jkt_2 = $hasil;
              };

              $ready_apartemen_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
              `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE`
              = 'Apartemen'");
              if ($ready_apartemen_jkt_3 == []) {
              $ready_apartemen_jkt_3 = 0;
              }else{
              $hasil = 0;
              for ($i=0; $i < Count($ready_apartemen_jkt_3) ; $i++) { $hasil=$ready_apartemen_jkt_3[$i]->HP_PORT +
                $hasil;
                }
                $ready_apartemen_jkt_3 = $hasil;
                };

                // $ready_apartemen_jkt_3 = Count($ready_apartemen_jkt_3);
                $ready_apartemen_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                `PROPERTY_TYPE` = 'Apartemen'");
                if ($ready_apartemen_semarang == []) {
                $ready_apartemen_semarang = 0;
                }else{
                $hasil = 0;
                for ($i=0; $i < Count($ready_apartemen_semarang) ; $i++) { $hasil=$ready_apartemen_semarang[$i]->HP_PORT
                  + $hasil;
                  }
                  $ready_apartemen_semarang = $hasil;
                  };
                  $ready_apartemen_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on
                  `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                  `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                  `PROPERTY_TYPE` = 'Apartemen'");
                  if ($ready_apartemen_surabaya == []) {
                  $ready_apartemen_surabaya = 0;
                  }else{
                  $hasil = 0;
                  for ($i=0; $i < Count($ready_apartemen_surabaya) ; $i++) { $hasil=$ready_apartemen_surabaya[$i]->
                    HP_PORT + $hasil;
                    }
                    $ready_apartemen_surabaya = $hasil;
                    };
                    $ready_ruko_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                    `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                    `PROPERTY_TYPE` =
                    'Ruko/Rukan'");
                    if ($ready_ruko_jkt_1 == []) {
                    $ready_ruko_jkt_1 = 0;
                    }else{
                    $hasil = 0;
                    for ($i=0; $i < Count($ready_ruko_jkt_1) ; $i++) { $hasil=$ready_ruko_jkt_1[$i]->HP_PORT + $hasil;
                      }
                      $ready_ruko_jkt_1 = $hasil;
                      };
                      $ready_ruko_jkt_2 = \DB::select("
                      select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                      `wilayah_kodes`.`nama_wilayah` where
                      `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                      `PROPERTY_TYPE` =
                      'Ruko/Rukan'");
                      if ($ready_ruko_jkt_2 == []) {
                      $ready_ruko_jkt_2 = 0;
                      }else{
                      $hasil = 0;
                      for ($i=0; $i < Count($ready_ruko_jkt_2) ; $i++) { $hasil=$ready_ruko_jkt_2[$i]->HP_PORT + $hasil;
                        }
                        $ready_ruko_jkt_2 = $hasil;
                        };
                        $ready_ruko_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                        `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                        `PROPERTY_TYPE` =
                        'Ruko/Rukan'");
                        if ($ready_ruko_jkt_3 == []) {
                        $ready_ruko_jkt_3 = 0;
                        }else{
                        $hasil = 0;
                        for ($i=0; $i < Count($ready_ruko_jkt_3) ; $i++) { $hasil=$ready_ruko_jkt_3[$i]->HP_PORT +
                          $hasil;
                          }
                          $ready_ruko_jkt_3 = $hasil;
                          };

                          $ready_ruko_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on
                          `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                          `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                          `PROPERTY_TYPE` =
                          'Ruko/Rukan'");
                          if ($ready_ruko_semarang == []) {
                          $ready_ruko_semarang = 0;
                          }else{
                          $hasil = 0;
                          for ($i=0; $i < Count($ready_ruko_semarang) ; $i++) { $hasil=$ready_ruko_semarang[$i]->HP_PORT
                            + $hasil;
                            }
                            $ready_ruko_semarang = $hasil;
                            };

                            $ready_ruko_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on
                            `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                            `PROPERTY_TYPE` =
                            'Ruko/Rukan'");
                            if ($ready_ruko_surabaya == []) {
                            $ready_ruko_surabaya = 0;
                            }else{
                            $hasil = 0;
                            for ($i=0; $i < Count($ready_ruko_surabaya) ; $i++) { $hasil=$ready_ruko_surabaya[$i]->
                              HP_PORT + $hasil;
                              }
                              $ready_ruko_surabaya = $hasil;
                              };
                              $ready_land_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on
                              `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                              `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND
                              `PROPERTY_TYPE` = 'Landed
                              House'");
                              if ($ready_land_jkt_1 == []) {
                              $ready_land_jkt_1 = 0;
                              }else{
                              $hasil = 0;
                              for ($i=0; $i < Count($ready_land_jkt_1) ; $i++) { $hasil=$ready_land_jkt_1[$i]->HP_PORT +
                                $hasil;
                                }
                                $ready_land_jkt_1 = $hasil;
                                };
                                $ready_land_jkt_2 = \DB::select("
                                select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                `wilayah_kodes`.`nama_wilayah` where
                                `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'
                                AND `PROPERTY_TYPE` = 'Landed
                                House'");
                                if ($ready_land_jkt_2 == []) {
                                $ready_land_jkt_2 = 0;
                                }else{
                                $hasil = 0;
                                for ($i=0; $i < Count($ready_land_jkt_2) ; $i++) { $hasil=$ready_land_jkt_2[$i]->HP_PORT
                                  + $hasil;
                                  }
                                  $ready_land_jkt_2 = $hasil;
                                  };
                                  $ready_land_jkt_3 = \DB::select("
                                  select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                  `wilayah_kodes`.`nama_wilayah` where
                                  `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'
                                  AND `PROPERTY_TYPE` = 'Landed
                                  House'");
                                  if ($ready_land_jkt_3 == []) {
                                  $ready_land_jkt_3 = 0;
                                  }else{
                                  $hasil = 0;
                                  for ($i=0; $i < Count($ready_land_jkt_3) ; $i++) { $hasil=$ready_land_jkt_3[$i]->
                                    HP_PORT + $hasil;
                                    }
                                    $ready_land_jkt_3 = $hasil;
                                    };
                                    $ready_land_semarang = \DB::select("
                                    select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                    `wilayah_kodes`.`nama_wilayah` where
                                    `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
                                    SELL' AND `PROPERTY_TYPE` = 'Landed
                                    House'");
                                    if ($ready_land_semarang == []) {
                                    $ready_land_semarang = 0;
                                    }else{
                                    $hasil = 0;
                                    for ($i=0; $i < Count($ready_land_semarang) ; $i++) {
                                      $hasil=$ready_land_semarang[$i]->HP_PORT + $hasil;
                                      }
                                      $ready_land_semarang = $hasil;
                                      };
                                      $ready_land_surabaya = \DB::select("
                                      select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                      `wilayah_kodes`.`nama_wilayah` where
                                      `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
                                      SELL' AND `PROPERTY_TYPE` = 'Landed
                                      House'");
                                      if ($ready_land_surabaya == []) {
                                      $ready_land_surabaya = 0;
                                      }else{
                                      $hasil = 0;
                                      for ($i=0; $i < Count($ready_land_surabaya) ; $i++) {
                                        $hasil=$ready_land_surabaya[$i]->HP_PORT + $hasil;
                                        }
                                        $ready_land_surabaya = $hasil;
                                        };

                                        $ready_mixed_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                        `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Mix Use'");
                                        if ($ready_mixed_jkt_1 == []) {
                                        $ready_mixed_jkt_1 = 0;
                                        }else{
                                        $hasil = 0;
                                        for ($i=0; $i < Count($ready_mixed_jkt_1) ; $i++) {
                                          $hasil=$ready_mixed_jkt_1[$i]->HP_PORT + $hasil;
                                          }
                                          $ready_mixed_jkt_1 = $hasil;
                                          };
                                          $ready_mixed_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                          `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Mix Use'");
                                          if ($ready_mixed_jkt_2 == []) {
                                          $ready_mixed_jkt_2 = 0;
                                          }else{
                                          $hasil = 0;
                                          for ($i=0; $i < Count($ready_mixed_jkt_2) ; $i++) {
                                            $hasil=$ready_mixed_jkt_2[$i]->HP_PORT + $hasil;
                                            }
                                            $ready_mixed_jkt_2 = $hasil;
                                            };
                                            $ready_mixed_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Mix Use'");
                                            if ($ready_mixed_jkt_3 == []) {
                                            $ready_mixed_jkt_3 = 0;
                                            }else{
                                            $hasil = 0;
                                            for ($i=0; $i < Count($ready_mixed_jkt_3) ; $i++) {
                                              $hasil=$ready_mixed_jkt_3[$i]->HP_PORT + $hasil;
                                              }
                                              $ready_mixed_jkt_3 = $hasil;
                                              };
                                              $ready_mixed_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                              `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Mix Use'");
                                              if ($ready_mixed_semarang == []) {
                                              $ready_mixed_semarang = 0;
                                              }else{
                                              $hasil = 0;
                                              for ($i=0; $i < Count($ready_mixed_semarang) ; $i++) {
                                                $hasil=$ready_mixed_semarang[$i]->HP_PORT + $hasil;
                                                }
                                                $ready_mixed_semarang = $hasil;
                                                };
                                                $ready_mixed_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` = 'Mix Use'");
                                                if ($ready_mixed_surabaya == []) {
                                                $ready_mixed_surabaya = 0;
                                                }else{
                                                $hasil = 0;
                                                for ($i=0; $i < Count($ready_mixed_surabaya) ; $i++) {
                                                  $hasil=$ready_mixed_surabaya[$i]->HP_PORT + $hasil;
                                                  }
                                                  $ready_mixed_surabaya = $hasil;
                                                  };

                                                  $ready_pergudangan_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                  `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
                                                  'Pergudangan'");
                                                  if ($ready_pergudangan_jkt_1 == []) {
                                                  $ready_pergudangan_jkt_1 = 0;
                                                  }else{
                                                  $hasil = 0;
                                                  for ($i=0; $i < Count($ready_pergudangan_jkt_1) ; $i++) {
                                                    $hasil=$ready_pergudangan_jkt_1[$i]->HP_PORT + $hasil;
                                                    }
                                                    $ready_pergudangan_jkt_1 = $hasil;
                                                    };

                                                    $ready_pergudangan_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                    `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
                                                    'Pergudangan'");
                                                    if ($ready_pergudangan_jkt_2 == []) {
                                                    $ready_pergudangan_jkt_2 = 0;
                                                    }else{
                                                    $hasil = 0;
                                                    for ($i=0; $i < Count($ready_pergudangan_jkt_2) ; $i++) {
                                                      $hasil=$ready_pergudangan_jkt_2[$i]->HP_PORT + $hasil;
                                                      }
                                                      $ready_pergudangan_jkt_2 = $hasil;
                                                      };
                                                      $ready_pergudangan_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                      `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
                                                      'Pergudangan'");
                                                      if ($ready_pergudangan_jkt_3 == []) {
                                                      $ready_pergudangan_jkt_3 = 0;
                                                      }else{
                                                      $hasil = 0;
                                                      for ($i=0; $i < Count($ready_pergudangan_jkt_3) ; $i++) {
                                                        $hasil=$ready_pergudangan_jkt_3[$i]->HP_PORT + $hasil;
                                                        }
                                                        $ready_pergudangan_jkt_3 = $hasil;
                                                        };;
                                                        $ready_pergudangan_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                        `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
                                                        'Pergudangan'");
                                                        if ($ready_pergudangan_semarang == []) {
                                                        $ready_pergudangan_semarang = 0;
                                                        }else{
                                                        $hasil = 0;
                                                        for ($i=0; $i < Count($ready_pergudangan_semarang) ; $i++) {
                                                          $hasil=$ready_pergudangan_semarang[$i]->HP_PORT + $hasil;
                                                          }
                                                          $ready_pergudangan_semarang = $hasil;
                                                          };;
                                                          $ready_pergudangan_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                          `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `PROPERTY_TYPE` =
                                                          'Pergudangan'");
                                                          if ($ready_pergudangan_surabaya == []) {
                                                          $ready_pergudangan_surabaya = 0;
                                                          }else{
                                                          $hasil = 0;
                                                          for ($i=0; $i < Count($ready_pergudangan_surabaya) ; $i++) {
                                                            $hasil=$ready_pergudangan_surabaya[$i]->HP_PORT + $hasil;
                                                            }
                                                            $ready_pergudangan_surabaya = $hasil;
                                                            };;


                                                            $office_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Office Building'");
                                                            $office_jkt_1 = Count($office_jkt_1);
                                                            $office_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Office Building'");
                                                            $office_jkt_2 = Count($office_jkt_2);
                                                            $office_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Office Building'");
                                                            $office_jkt_3 = Count($office_jkt_3);
                                                            $office_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Office Building'");
                                                            $office_semarang = Count($office_semarang);
                                                            $office_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Office Building'");
                                                            $office_surabaya = Count($office_surabaya);

                                                            $apartemen_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Apartemen'");
                                                            $apartemen_jkt_1 = Count($apartemen_jkt_1);
                                                            $apartemen_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Apartemen'");
                                                            $apartemen_jkt_2 = Count($apartemen_jkt_2);
                                                            $apartemen_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Apartemen'");
                                                            $apartemen_jkt_3 = Count($apartemen_jkt_3);
                                                            $apartemen_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Apartemen'");
                                                            $apartemen_semarang = Count($apartemen_semarang);
                                                            $apartemen_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Apartemen'");
                                                            $apartemen_surabaya = Count($apartemen_surabaya);
                                                            $ruko_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Ruko/Rukan'
");
                                                            $ruko_jkt_1 = Count($ruko_jkt_1);
                                                            $ruko_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Ruko/Rukan'
");
                                                            $ruko_jkt_2 = Count($ruko_jkt_2);
                                                            $ruko_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Ruko/Rukan'
");
                                                            $ruko_jkt_3 = Count($ruko_jkt_3);
                                                            $ruko_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Ruko/Rukan'
");
                                                            $ruko_semarang = Count($ruko_semarang);
                                                            $ruko_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Ruko/Rukan'
");
                                                            $ruko_surabaya = Count($ruko_surabaya);
                                                            $land_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            $land_jkt_1 = Count($land_jkt_1);
                                                            $land_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            $land_jkt_2 = Count($land_jkt_2);
                                                            $land_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            $land_jkt_3 = Count($land_jkt_3);
                                                            $land_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            $land_semarang = Count($land_semarang);
                                                            $land_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            $land_surabaya = Count($land_surabaya);
                                                            // $land_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Landed House'");
                                                            // $land_surabaya = Count($land_surabaya);

                                                            $mixed_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            $mixed_jkt_1 = Count($mixed_jkt_1);
                                                            $mixed_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            $mixed_jkt_2 = Count($mixed_jkt_2);
                                                            $mixed_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            $mixed_jkt_3 = Count($mixed_jkt_3);
                                                            $mixed_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            $mixed_semarang = Count($mixed_semarang);
                                                            $mixed_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            $mixed_surabaya = Count($mixed_surabaya);
                                                            // $mixed_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Mix Use'");
                                                            // $mixed_surabaya = Count($mixed_surabaya);

                                                            $pergudangan_jkt_1 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_jkt_1 = Count($pergudangan_jkt_1);
                                                            $pergudangan_jkt_2 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_jkt_2 = Count($pergudangan_jkt_2);
                                                            $pergudangan_jkt_3 = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_jkt_3 = Count($pergudangan_jkt_3);
                                                            $pergudangan_semarang = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_semarang = Count($pergudangan_semarang);
                                                            $pergudangan_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_surabaya = Count($pergudangan_surabaya);
                                                            $pergudangan_surabaya = \DB::select("select `HP_PORT` from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROPERTY_TYPE` = 'Pergudangan'");
                                                            $pergudangan_surabaya = Count($pergudangan_surabaya);


                                                            $ready_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'");
                                                            $ready_jkt_1 = Count($ready_jkt_1);
                                                            $ready_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'");
                                                            $ready_jkt_2 = Count($ready_jkt_2);
                                                            $ready_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'");
                                                            $ready_jkt_3 = Count($ready_jkt_3);
                                                            $ready_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'");
                                                            $ready_semarang = Count($ready_semarang);
                                                            $ready_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL'");
                                                            $ready_surabaya = Count($ready_surabaya);

                                                            // $ready_jkt_1 = \DB::select('SELECT * FROM `jakarta_1` WHERE
                                                            // `PROGRESS_STATUS` = "READY TO SELL"');
                                                            // $ready_jkt_1 = Count($ready_jkt_1);
                                                            // $ready_jkt_2 = \DB::select('SELECT * FROM `jakarta_2` WHERE
                                                            // `PROGRESS_STATUS` = "READY TO SELL"');
                                                            // $ready_jkt_2 = Count($ready_jkt_2);
                                                            // $ready_jkt_3 = \DB::select('SELECT * FROM `jakarta_3` WHERE
                                                            // `PROGRESS_STATUS` = "READY TO SELL"');
                                                            // $ready_jkt_3 = Count($ready_jkt_3);
                                                            // $ready_semarang = \DB::select('SELECT * FROM `semarang`
                                                            // WHERE `PROGRESS_STATUS` = "READY TO SELL"');
                                                            // $ready_semarang = Count($ready_semarang);
                                                            // $ready_surabaya = \DB::select('SELECT * FROM `surabaya`
                                                            // WHERE `PROGRESS_STATUS` = "READY TO SELL"');
                                                            // $ready_surabaya = Count($ready_surabaya);


                                                            $reject_Exclusive_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Exclusive'");
                                                            $reject_Exclusive_jkt_1 = Count($reject_Exclusive_jkt_1);
                                                            $reject_Exclusive_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Exclusive'");
                                                            $reject_Exclusive_jkt_2 = Count($reject_Exclusive_jkt_2);
                                                            $reject_Exclusive_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Exclusive'");
                                                            $reject_Exclusive_jkt_3 = Count($reject_Exclusive_jkt_3);
                                                            $reject_Exclusive_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Exclusive'");
                                                            $reject_Exclusive_semarang = Count($reject_Exclusive_semarang);
                                                            $reject_Exclusive_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Exclusive'");
                                                            $reject_Exclusive_surabaya = Count($reject_Exclusive_surabaya);
                                                            // $reject_Exclusive_surabaya = Count($reject_Exclusive_surabaya);



                                                            $reject_Limited_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Limited ISP Provider'");
                                                            $reject_Limited_jkt_1 = Count($reject_Limited_jkt_1);
                                                            $reject_Limited_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Limited ISP Provider'");
                                                            $reject_Limited_jkt_2 = Count($reject_Limited_jkt_2);
                                                            $reject_Limited_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Limited ISP Provider'");
                                                            $reject_Limited_jkt_3 = Count($reject_Limited_jkt_3);
                                                            $reject_Limited_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Limited ISP Provider'");
                                                            $reject_Limited_semarang = Count($reject_Limited_semarang);
                                                            $reject_Limited_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Limited ISP Provider'");
                                                            $reject_Limited_surabaya = Count($reject_Limited_surabaya);


                                                            $reject_Sales_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Sales isn t recommend'");
                                                            $reject_Sales_jkt_1 = Count($reject_Sales_jkt_1);
                                                            $reject_Sales_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Sales isn t recommend'");
                                                            $reject_Sales_jkt_2 = Count($reject_Sales_jkt_2);
                                                            $reject_Sales_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Sales isn t recommend'");
                                                            $reject_Sales_jkt_3 = Count($reject_Sales_jkt_3);
                                                            $reject_Sales_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Sales isn t recommend'");
                                                            $reject_Sales_semarang = Count($reject_Sales_semarang);
                                                            $reject_Sales_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Sales isn t recommend'");
                                                            $reject_Sales_surabaya = Count($reject_Sales_surabaya);


                                                            $reject_IKR_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'IKR/OSP isn t recommend'");
                                                            $reject_IKR_jkt_1 = Count($reject_IKR_jkt_1);
                                                            $reject_IKR_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'IKR/OSP isn t recommend'");
                                                            $reject_IKR_jkt_2 = Count($reject_IKR_jkt_2);
                                                            $reject_IKR_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'Jakarta 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'IKR/OSP isn t recommend'");
                                                            $reject_IKR_jkt_3 = Count($reject_IKR_jkt_3);
                                                            $reject_IKR_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'IKR/OSP isn t recommend'");
                                                            $reject_IKR_semarang = Count($reject_IKR_semarang);
                                                            $reject_IKR_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'IKR/OSP isn t recommend'");
                                                            $reject_IKR_surabaya = Count($reject_IKR_surabaya);


                                                            $reject_PnL_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'PnL calculation is not meet minimum margin profit'");
                                                            $reject_PnL_jkt_1 = Count($reject_PnL_jkt_1);
                                                            $reject_PnL_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'PnL calculation is not meet minimum margin profit'");
                                                            $reject_PnL_jkt_2 = Count($reject_PnL_jkt_2);
                                                            $reject_PnL_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'PnL calculation is not meet minimum margin profit'");
                                                            $reject_PnL_jkt_3 = Count($reject_PnL_jkt_3);
                                                            $reject_PnL_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'PnL calculation is not meet minimum margin profit'");
                                                            $reject_PnL_semarang = Count($reject_PnL_semarang);
                                                            $reject_PnL_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'PnL calculation is not meet minimum margin profit'");
                                                            $reject_PnL_surabaya = Count($reject_PnL_surabaya);


                                                            $reject_Business_jkt_1 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Business Scheme is not meet SOP'");
                                                            $reject_Business_jkt_1 = Count($reject_Business_jkt_1);
                                                            $reject_Business_jkt_2 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Business Scheme is not meet SOP'");
                                                            $reject_Business_jkt_2 = Count($reject_Business_jkt_2);
                                                            $reject_Business_jkt_3 = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Business Scheme is not meet SOP'");
                                                            $reject_Business_jkt_3 = Count($reject_Business_jkt_3);
                                                            $reject_Business_semarang = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Business Scheme is not meet SOP'");
                                                            $reject_Business_semarang = Count($reject_Business_semarang);
                                                            $reject_Business_surabaya = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where
                                                            `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'REJECT' AND `REJECT_CODE` = 'Business Scheme is not meet SOP'");
                                                            $reject_Business_surabaya = Count($reject_Business_surabaya);

                                                            $tahun = App\Tahun::all();
                                                            foreach ($tahun as $data) {
                                                            ${'ready_' .$data->tahun. '_jkt_1'} = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 1' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `BASO_DATE` LIKE '%".$data->tahun."'");
                                                            ${'ready_' .$data->tahun. '_jkt_1'} = Count(${'ready_'.$data->tahun. '_jkt_1'});
                                                            ${'ready_' .$data->tahun. '_jkt_2'} = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` = `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 2' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO SELL' AND `BASO_DATE` LIKE '%".$data->tahun."'");
                                                            ${'ready_' .$data->tahun. '_jkt_2'} = Count(${'ready_'
                                                            .$data->tahun. '_jkt_2'});
                                                            ${'ready_' .$data->tahun. '_jkt_3'} = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'JAKARTA 3' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
                                                            SELL' AND `BASO_DATE` LIKE '%".$data->tahun."'");
                                                            ${'ready_' .$data->tahun. '_jkt_3'} = Count(${'ready_'
                                                            .$data->tahun. '_jkt_3'});
                                                            ${'ready_' .$data->tahun. '_semarang'} = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SEMARANG' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
                                                            SELL' AND `BASO_DATE` LIKE '%".$data->tahun."'");
                                                            ${'ready_' .$data->tahun. '_semarang'} = Count(${'ready_'
                                                            .$data->tahun. '_semarang'});
                                                            ${'ready_' .$data->tahun. '_surabaya'} = \DB::select("select * from `TABLE 5` join `wilayah_kodes` on `TABLE 5`.`CITY` =
                                                            `wilayah_kodes`.`nama_wilayah` where `wilayah_kodes`.`name` = 'SURABAYA' AND `TABLE 5`.`PROGRESS_STATUS` = 'READY TO
                                                            SELL' AND `BASO_DATE` LIKE '%".$data->tahun."'");
                                                            ${'ready_' .$data->tahun. '_surabaya'} = Count(${'ready_'
                                                            .$data->tahun. '_surabaya'});
                                                            }

                                                            @endphp

                                                            @section('script')
                                                            <script
                                                              src="{{asset('plugins/datatables/jquery.dataTables.js')}}">
                                                            </script>
                                                            <script
                                                              src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}">
                                                            </script>
                                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8">
                                                            </script>

                                                            <script>
                                                              $( ".detailss" ).click(function() {
    window.localStorage.setItem('progres', "VIEW");
    setInterval(function(){ 
    window.localStorage.setItem('progres', "NOT");    
    window.localStorage.setItem('id_fase', "kosong");
    }, 10);
    

    });
  // chart
// backgroundColor : ['','', '', '', '', '', '', '#01ff70','#dc3545'],
    var SummaryData = {
        labels: ['JKT 1', 'JKT 2', 'JKT 3', 'Semarang', 'Surabaya'],
        datasets: [
  
      
          {
            label: 'NEGOTIATION',
            backgroundColor: 'rgb(141, 169, 196)',
            borderColor: 'rgb(141, 169, 196)',
            pointRadius: false,
            pointColor: 'rgb(141, 169, 196)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$NEGOTIATION_jkt_1}},
              {{$NEGOTIATION_jkt_2}},
              {{$NEGOTIATION_jkt_3}},
              {{$NEGOTIATION_semarang}},
              {{$NEGOTIATION_surabaya}},
          
            ]
            
          },
          {
              label: 'SUBMIT PROPOSAL',
              backgroundColor: '#03b1fc',
              borderColor: '#03b1fc',
              pointRadius: false,
              pointColor: '#03b1fc',
              pointStrokeColor: '#c1c7d1',
              pointHighlightFill: '#fff',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [
              {{$SUBMIT_PROPOSAL_jkt_1}},
              {{$SUBMIT_PROPOSAL_jkt_2}},
              {{$SUBMIT_PROPOSAL_jkt_3}},
              {{$SUBMIT_PROPOSAL_semarang}},
              {{$SUBMIT_PROPOSAL_surabaya}},
              ]
              },
          {
            label: 'SITE SURVEY',
            backgroundColor: 'rgb(0, 123, 255)',
            borderColor: 'rgb(0, 123, 255)',
            pointRadius: false,
            pointColor: 'rgb(0, 123, 255)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            
            data: [
              {{$site_survey_jkt_1}},
              {{$site_survey_jkt_2}},
              {{$site_survey_jkt_3}},
              {{$site_survey_semarang}},
              {{$site_survey_surabaya}},
            ]
          },
          {
            label: 'BOQ, SITE SURVEY REPORT, DESIGN',
            backgroundColor: 'rgb(108, 117, 125)',
            borderColor: 'rgb(108, 117, 125)',
            pointRadius: false,
            pointColor: 'rgb(108, 117, 125)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
           
            data: [
              {{$boq_jkt_1}},
              {{$boq_jkt_2}},
              {{$boq_jkt_3}},
              {{$boq_semarang}},
              {{$boq_surabaya}},
            ]
          },
          
          
          
          
          
          
          
          
          
          
          {
            label: 'PnL PROGRESS',
            backgroundColor: 'rgb(255, 234, 74)',
            borderColor: 'rgb(255, 234, 74)',
            pointRadius: false,
            pointColor: 'rgb(255, 234, 74)',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$pnl_jkt_1}},
              {{$pnl_jkt_2}},
              {{$pnl_jkt_3}},
              {{$pnl_semarang}},
              {{$pnl_surabaya}},
            ]
          },
          {
              label: 'NEGOTIATION 2 - PKS REVIEW',
              backgroundColor: 'rgb(217, 67, 96)',
              borderColor: 'rgb(217, 67, 96)',
              pointRadius: false,
              pointColor: 'rgb(217, 67, 96)',
              pointStrokeColor: 'rgb(217, 67, 96)',
              pointHighlightFill: 'rgb(217, 67, 96)',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [
              {{$reject_Business_jkt_1}},
              {{$reject_Business_jkt_2}},
              {{$reject_Business_jkt_3}},
              {{$reject_Business_semarang}},
              {{$reject_Business_surabaya}},
              ]
              },




              
        ]
      }
      var barChartCanvas = $('#progres').get(0).getContext('2d')
      barChartCanvas.height = 1000;
      var barChartData = jQuery.extend(true, {}, SummaryData)
      var temp0 = SummaryData.datasets[0]
      var temp1 = SummaryData.datasets[1]
      barChartData.datasets[0] = temp1
      barChartData.datasets[1] = temp0
    
            var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
                yAxes: [{
                ticks: {
                
                min: 0,
                stepSize: 10
                }
                }]
                }
      }
      var barChart = new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartData,
        options: stackedBarChartOptions
      })
// var ctx = document.getElementById('progres').getContext('2d');
// var myChart = new Chart(ctx, {
//     type: 'bar',
//     data: {
//         labels: ['SUBMIT PROPOSAL', 'NEGOTIATION 1 - BUSINESS SCHEME', 'SITE SURVEY', 'BOQ, SITE SURVEY REPORT, DESIGN', 'PnL PROGRESS', 'NEGOTIATION 2 - PKS REVIEW', 'SIGNED PKS', 'ROLL-OUT PROGRESS','READY TO SELL'],
//         datasets: [{
//             label: 'Jumlah Progress',
//             data: [{{App\Report::where('PROGRESS_STATUS', 'SUBMIT PROPOSAL')->count()}},{{App\Report::where('PROGRESS_STATUS', 'NEGOTIATION 1 - BUSINESS SCHEME')->count()}},{{App\Report::where('PROGRESS_STATUS', 'SITE SURVEY')->count()}},{{App\Report::where('PROGRESS_STATUS', 'BOQ, SITE SURVEY REPORT, DESIGN')->count()}},{{App\Report::where('PROGRESS_STATUS', 'PnL PROGRESS')->count()}},{{App\Report::where('PROGRESS_STATUS', 'NEGOTIATION 2 - PKS REVIEW')->count()}},{{App\Report::where('PROGRESS_STATUS', 'SIGNED PKS')->count()}},{{App\Report::where('PROGRESS_STATUS', 'ROLL-OUT PROGRESS')->count()}},{{App\Report::where('PROGRESS_STATUS', 'READY TO SELL')->count()}}],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255, 99, 132, 1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero: true
//                 }
//             }]
//         }
//     }
// });

$('#property-tab').on('click', function (e) {
  e.preventDefault()
   console.log("property");
     var property_SummaryData = {
       
        labels: ['JKT 1', 'JKT 2', 'JKT 3', 'Semarang', 'Surabaya'],
        datasets: [
          // {
          //   label: 'DESK SURVEY',
          //   backgroundColor: 'rgba(60,141,188,0.9)',
          //   borderColor: 'rgba(60,141,188,0.8)',
          //   pointRadius: false,
          //   pointColor: '#3b8bba',
          //   pointStrokeColor: 'rgba(60,141,188,1)',
          //   pointHighlightFill: '#fff',
          //   pointHighlightStroke: 'rgba(60,141,188,1)',
          //   data: [28, 48, 40, 19, 86, 27, 90, 90,70,22,100,59]
          // },
    {
            label: 'Office Building',
            backgroundColor: '#00a8b5',
            borderColor: '#00a8b5',
            pointRadius: false,
            pointColor: '#00a8b5',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$office_jkt_1}},
              {{$office_jkt_2}},
              {{$office_jkt_3}},
              {{$office_semarang}},
              {{$office_surabaya}},
            ]
          },
          {
            
            
            
            label: 'Apartemen',
            backgroundColor: '#774898',
            borderColor: '#774898',
            pointRadius: false,
            pointColor: '#774898',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$apartemen_jkt_1}},
              {{$apartemen_jkt_2}},
              {{$apartemen_jkt_3}},
              {{$apartemen_semarang}},
              {{$apartemen_surabaya}},
          
            ]
            
          },
          {
            
            
            label: 'Ruko/Rukan',
            backgroundColor: '#de4383',
            borderColor: '#de4383',
            pointRadius: false,
            pointColor: '#de4383',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            
            data: [
              {{$ruko_jkt_1}},
              {{$ruko_jkt_2}},
              {{$ruko_jkt_3}},
              {{$ruko_semarang}},
              {{$ruko_surabaya}},
            ]
          },
          {
            label: 'Landed House',
            backgroundColor: '#f3ae4b',
            borderColor: '#f3ae4b',
            pointRadius: false,
            pointColor: '#f3ae4b',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
           
            data: [
              {{$land_jkt_1}},
              {{$land_jkt_2}},
              {{$land_jkt_3}},
              {{$land_semarang}},
              {{$land_surabaya}},
            ]
          },
          {
            label: 'Mix Use',
            backgroundColor: '#f88020',
            borderColor: '#f88020',
            pointRadius: false,
            pointColor: '#f88020',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$mixed_jkt_1}},
              {{$mixed_jkt_2}},
              {{$mixed_jkt_3}},
              {{$mixed_semarang}},
              {{$mixed_surabaya}},
            ]
          },
          {
              label: 'Pergudangan',
              backgroundColor: '#d1274b',
              borderColor: '#d1274b',
              pointRadius: false,
              pointColor: '#d1274b',
              pointStrokeColor: '#d1274b',
              pointHighlightFill: '#d1274b',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [
              {{$pergudangan_jkt_1}},
              {{$pergudangan_jkt_2}},
              {{$pergudangan_jkt_3}},
              {{$pergudangan_semarang}},
              {{$pergudangan_surabaya}},
              ]
              },
        ]
      }
      var propertyChart = $('#property_chart').get(0).getContext('2d')
      propertyChart.height = 1000;
      var propertyChartDate = jQuery.extend(true, {}, property_SummaryData)
      var temp0 = property_SummaryData.datasets[0]
      var temp1 = property_SummaryData.datasets[1]
      propertyChartDate.datasets[0] = temp1
      propertyChartDate.datasets[1] = temp0
    
        var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
                scales: {
        yAxes: [{
        ticks: {
        
        min: 0,
        stepSize: 10
        }
        }]
        }
    
      }
      var barChart = new Chart(propertyChart, {
        type: 'bar',
        data: propertyChartDate,
        options: stackedBarChartOptions
      })

$(this).tab('show');
  
})

$("#duration").on('input',function() {
var value = $(this).val();
var panjang = value.length;
var data = $("#baso_date").val();
var duration = $("#duration").val();

var dateAr = data.split('-');
var yearint = parseInt(dateAr[2]) + parseInt(duration)
var newDate = dateAr[0] + '-' + dateAr[1] + '-' + yearint;
$("#pks_end").val(newDate)

});

$('#ready-tab').on('click', function (e) {
  e.preventDefault()
  //  var ready_chart = document.getElementById('').getContext('2d')
      var property_SummaryData = {
       
        labels: ['JKT 1', 'JKT 2', 'JKT 3', 'Semarang', 'Surabaya'],
        datasets: [
            
        @foreach ($tahun as $data)
        @php
        $jkt_1 = ${'ready_'.$data->tahun."_jkt_1"};
        $jkt_2 = ${'ready_'.$data->tahun."_jkt_2"};
        $jkt_3 = ${'ready_'.$data->tahun."_jkt_3"};
        $semarang = ${'ready_'.$data->tahun."_semarang"};
        $surabaya = ${'ready_'.$data->tahun."_surabaya"};
        @endphp
      {
        label: '{{$data->tahun}}',
        backgroundColor: '#{{$data->color}}',
        borderColor: '#{{$data->color}}',
        pointRadius: false,
        pointColor: '#{{$data->color}}',
        pointStrokeColor: '#{{$data->color}}',
        pointHighlightFill: '#{{$data->color}}',
        pointHighlightStroke: '#{{$data->color}}',
        data: [
        {{$jkt_1}},
        {{$jkt_2}},
        {{$jkt_3}},
        {{$semarang}},
        {{$surabaya}},
        ]
        },
      @endforeach      
      
      
          // {
          //     label: '2015',
          //     backgroundColor: '#380e7f',
          //     borderColor: '#380e7f',
          //     pointRadius: false,
          //     pointColor: '#380e7f',
          //     pointStrokeColor: '#380e7f',
          //     pointHighlightFill: '#380e7f',
          //     pointHighlightStroke: 'rgba(220,220,220,1)',
          //     data: [
          //     {{$ready_2015_jkt_1}},
          //     {{$ready_2015_jkt_2}},
          //     {{$ready_2015_jkt_3}},
          //     {{$ready_2015_semarang}},
          //     {{$ready_2015_surabaya}},
          //     ]
          // },
          // {
          //     label: '2016',
          //     backgroundColor: '#6915cf',
          //     borderColor: '#6915cf',
          //     pointRadius: false,
          //     pointColor: '#6915cf',
          //     pointStrokeColor: '#6915cf',
          //     pointHighlightFill: '#6915cf',
          //     pointHighlightStroke: 'rgba(220,220,220,1)',
          //     data: [
          //     {{$ready_2016_jkt_1}},
          //     {{$ready_2016_jkt_2}},
          //     {{$ready_2016_jkt_3}},
          //     {{$ready_2016_semarang}},
          //     {{$ready_2016_surabaya}},
          //     ]
          // },
          // {
          //     label: '2017',
          //     backgroundColor: '#d62196',
          //     borderColor: '#d62196',
          //     pointRadius: false,
          //     pointColor: '#d62196',
          //     pointStrokeColor: '#d62196',
          //     pointHighlightFill: '#d62196',
          //     pointHighlightStroke: 'rgba(220,220,220,1)',
          //     data: [
          //     {{$ready_2017_jkt_1}},
          //     {{$ready_2017_jkt_2}},
          //     {{$ready_2017_jkt_3}},
          //     {{$ready_2017_semarang}},
          //     {{$ready_2017_surabaya}},
          //     ]
          // },
          // {
          //     label: '2018',
          //     backgroundColor: '#e497cd',
          //     borderColor: '#e497cd',
          //     pointRadius: false,
          //     pointColor: '#e497cd',
          //     pointStrokeColor: '#e497cd',
          //     pointHighlightFill: '#e497cd',
          //     pointHighlightStroke: 'rgba(220,220,220,1)',
          //     data: [
          //     {{$ready_2018_jkt_1}},
          //     {{$ready_2018_jkt_2}},
          //     {{$ready_2018_jkt_3}},
          //     {{$ready_2018_semarang}},
          //     {{$ready_2018_surabaya}},
          //     ]
          // },
          // {
          //     label: '2019',
          //     backgroundColor: '#64ccda',
          //     borderColor: '#64ccda',
          //     pointRadius: false,
          //     pointColor: '#64ccda',
          //     pointStrokeColor: '#64ccda',
          //     pointHighlightFill: '#64ccda',
          //     pointHighlightStroke: 'rgba(220,220,220,1)',
          //     data: [
          //     {{$ready_2019_jkt_1}},
          //     {{$ready_2019_jkt_2}},
          //     {{$ready_2019_jkt_3}},
          //     {{$ready_2019_semarang}},
          //     {{$ready_2019_surabaya}},
          //     ]
          // },
        ]
      }
      var propertyChart = $('#ready_chart').get(0).getContext('2d')
      propertyChart.height = 1000;
      var propertyChartDate = jQuery.extend(true, {}, property_SummaryData)
      var temp0 = property_SummaryData.datasets[0]
      var temp1 = property_SummaryData.datasets[1]
      propertyChartDate.datasets[0] = temp1
      propertyChartDate.datasets[1] = temp0
    
        var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
        yAxes: [{
        ticks: {
        
        min: 0,
        stepSize: 10
        }
        }]
        }
      }
      var barChart = new Chart(propertyChart, {
        type: 'bar',
        data: propertyChartDate,
        options: stackedBarChartOptions
      })

$(this).tab('show');
  
})


$('#reject-tab').on('click', function (e) {
  e.preventDefault()
  //  var reject_chart = document.getElementById('').getContext('2d')
      var property_SummaryData = {
    
        labels: ['JKT 1', 'JKT 2', 'JKT 3', 'Semarang', 'Surabaya'],
        datasets: [
    {
            label: 'Exclusive',
            backgroundColor: '#42b883',
            borderColor: '#42b883',
            pointRadius: false,
            pointColor: '#42b883',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$reject_Exclusive_jkt_1}},
              {{$reject_Exclusive_jkt_2}},
              {{$reject_Exclusive_jkt_3}},
              {{$reject_Exclusive_semarang}},
              {{$reject_Exclusive_surabaya}},
            ]
          },
          {
            label: 'Limited ISP Provider',
            backgroundColor: '#347474',
            borderColor: '#347474',
            pointRadius: false,
            pointColor: '#347474',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$reject_Limited_jkt_1}},
              {{$reject_Limited_jkt_2}},
              {{$reject_Limited_jkt_3}},
              {{$reject_Limited_semarang}},
              {{$reject_Limited_surabaya}},
          
            ]
            
          },
          {
            
            label: 'IKR/OSP isn t recommend',
            backgroundColor: '#35495e',
            borderColor: '#35495e',
            pointRadius: false,
            pointColor: '#35495e',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$reject_IKR_jkt_1}},
              {{$reject_IKR_jkt_2}},
              {{$reject_IKR_jkt_3}},
              {{$reject_IKR_semarang}},
              {{$reject_IKR_surabaya}},
            ]
          },
          
          
          
          
          {
            label: 'PnL calculation is not meet minimum margin profit',
            backgroundColor: '#ff7e67',
            borderColor: '#ff7e67',
            pointRadius: false,
            pointColor: '#ff7e67',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
           
            data: [
              {{$reject_PnL_jkt_1}},
              {{$reject_PnL_jkt_2}},
              {{$reject_PnL_jkt_3}},
              {{$reject_PnL_semarang}},
              {{$reject_PnL_surabaya}},
            ]
          },
          {
            label: 'Sales isn t recommend',
            backgroundColor: '#f39422',
            borderColor: '#f39422',
            pointRadius: false,
            pointColor: '#f39422',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$reject_Sales_jkt_1}},
              {{$reject_Sales_jkt_2}},
              {{$reject_Sales_jkt_3}},
              {{$reject_Sales_semarang}},
              {{$reject_Sales_surabaya}},
            ]
          },
          {
              label: 'Business Scheme is not meet SOP',
              backgroundColor: '#293a80',
              borderColor: '#293a80',
              pointRadius: false,
              pointColor: '#293a80',
              pointStrokeColor: '#293a80',
              pointHighlightFill: '#293a80',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [
              {{$reject_Business_jkt_1}},
              {{$reject_Business_jkt_2}},
              {{$reject_Business_jkt_3}},
              {{$reject_Business_semarang}},
              {{$reject_Business_surabaya}},
              ]
              },
        ]
      }
      var propertyChart = $('#reject_chart').get(0).getContext('2d')
      propertyChart.height = 1000;
      var propertyChartDate = jQuery.extend(true, {}, property_SummaryData)
      var temp0 = property_SummaryData.datasets[0]
      var temp1 = property_SummaryData.datasets[1]
      propertyChartDate.datasets[0] = temp1
      propertyChartDate.datasets[1] = temp0
    
        var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
                yAxes: [{
                ticks: {
                
                min: 0,
                stepSize: 10
                }
                }]
                }
   
      }
      var barChart = new Chart(propertyChart, {
        type: 'bar',
        data: propertyChartDate,
        options: stackedBarChartOptions
      })

$(this).tab('show');
  
})



$('#homepas-tab').on('click', function (e) {
  e.preventDefault()
  //  var reject_chart = document.getElementById('').getContext('2d')
      var property_SummaryData = {
    
        labels: ['JKT 1', 'JKT 2', 'JKT 3', 'Semarang', 'Surabaya'],
        datasets: [
     {
            label: 'Office Building',
            backgroundColor: '#00a8b5',
            borderColor: '#00a8b5',
            pointRadius: false,
            pointColor: '#00a8b5',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$ready_office_jkt_1}},
              {{$ready_office_jkt_2}},
              {{$ready_office_jkt_3}},
              {{$ready_office_semarang}},
              {{$ready_office_surabaya}},
            ]
          },
          {
            
            
            
            label: 'Apartemen',
            backgroundColor: '#774898',
            borderColor: '#774898',
            pointRadius: false,
            pointColor: '#774898',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$ready_apartemen_jkt_1}},
              {{$ready_apartemen_jkt_2}},
              {{$ready_apartemen_jkt_3}},
              {{$ready_apartemen_semarang}},
              {{$ready_apartemen_surabaya}},
          
            ]
            
          },
          {
            
            
            label: 'Ruko/Rukan',
            backgroundColor: '#de4383',
            borderColor: '#de4383',
            pointRadius: false,
            pointColor: '#de4383',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            
            data: [
              {{$ready_ruko_jkt_1}},
              {{$ready_ruko_jkt_2}},
              {{$ready_ruko_jkt_3}},
              {{$ready_ruko_semarang}},
              {{$ready_ruko_surabaya}},
            ]
          },
          {
            label: 'Landed House',
            backgroundColor: '#f3ae4b',
            borderColor: '#f3ae4b',
            pointRadius: false,
            pointColor: '#f3ae4b',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
           
            data: [
              {{$ready_land_jkt_1}},
              {{$ready_land_jkt_2}},
              {{$ready_land_jkt_3}},
              {{$ready_land_semarang}},
              {{$ready_land_surabaya}},
            ]
          },
          {
            label: 'Mix Use',
            backgroundColor: '#f88020',
            borderColor: '#f88020',
            pointRadius: false,
            pointColor: '#f88020',
            pointStrokeColor: '#c1c7d1',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(220,220,220,1)',
            data: [
              {{$ready_mixed_jkt_1}},
              {{$ready_mixed_jkt_2}},
              {{$ready_mixed_jkt_3}},
              {{$ready_mixed_semarang}},
              {{$ready_mixed_surabaya}},
            ]
          },
          {
              label: 'Pergudangan',
              backgroundColor: '#d1274b',
              borderColor: '#d1274b',
              pointRadius: false,
              pointColor: '#d1274b',
              pointStrokeColor: '#d1274b',
              pointHighlightFill: '#d1274b',
              pointHighlightStroke: 'rgba(220,220,220,1)',
              data: [
              {{$ready_pergudangan_jkt_1}},
              {{$ready_pergudangan_jkt_2}},
              {{$ready_pergudangan_jkt_3}},
              {{$ready_pergudangan_semarang}},
              {{$ready_pergudangan_surabaya}},
              ]
              },
        ]
      }
      var propertyChart = $('#homepas_chart').get(0).getContext('2d')
      propertyChart.height = 1000;
      var propertyChartDate = jQuery.extend(true, {}, property_SummaryData)
      var temp0 = property_SummaryData.datasets[0]
      var temp1 = property_SummaryData.datasets[1]
      propertyChartDate.datasets[0] = temp1
      propertyChartDate.datasets[1] = temp0
    
        var stackedBarChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
                yAxes: [{
                ticks: {
                min: 0,
                stepSize: 50
                }
                }]
                }
   
      }
      var barChart = new Chart(propertyChart, {
        type: 'bar',
        data: propertyChartDate,
        options: stackedBarChartOptions
      })

$(this).tab('show');
  
})





                                                            </script>


                                                            <script>
                                                              $('#DESKSURVEY').on('hidden.bs.modal', function () {
        
      $("#Edit_REPORT_DESK_SURVEY").addClass("ilang")
      $("#Edit_REPORT_DESK_SURVEY").removeClass("muncul")
      $("#Edit_REPORT_SUBMIT_PROPOSAL").addClass("ilang")
      $("#Edit_REPORT_SUBMIT_PROPOSAL").removeClass("muncul")
      $("#Edit_NEGOTIATION_1").addClass("ilang")
      $("#Edit_NEGOTIATION_1").removeClass("muncul")
      $("#Edit_SITE_SURVEY").addClass("ilang")
      $("#Edit_SITE_SURVEY").removeClass("muncul")
      $("#Edit_BOQ").addClass("ilang")
      $("#Edit_BOQ").removeClass("muncul")
      $("#Edit_PNL").addClass("ilang")
      $("#Edit_PNL").removeClass("muncul")
      $("#Edit_PKS_REVIEW").addClass("ilang")
      $("#Edit_PKS_REVIEW").removeClass("muncul")
      $("#Edit_ROLL").addClass("ilang")
      $("#Edit_ROLL").removeClass("muncul")
      $("#Edit_REJECT").addClass("ilang")
      $("#Edit_REJECT").removeClass("muncul")
      $("#Edit_READY").addClass("ilang")
      $("#Edit_READY").removeClass("muncul")



      $("#Edit_PKS_SIGN").removeClass("muncul")
      $("#Edit_PKS_SIGN").addClass("ilang")


    
    $('input[type=checkbox]:not(.viewcheckbox)').prop('checked',false);
    
    window.localStorage.setItem('progres', "NOT");
    window.localStorage.setItem('PROPERTY_TYPE', "");
    
    window.localStorage.setItem('id_fase', "kosong");
    document.cookie ='id_fase=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';


    
  })
                                                            </script>




                                                            @endsection