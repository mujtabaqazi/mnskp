<?php 
//by pace technologies
defined('BASEPATH') OR exit('No direct script access allowed');
class Checklists extends CI_Controller {
	public $srtools = array(
			array('label'=>'Fulfills Selection Criteria','name'=>'sr_r1_f1'),
			array('label'=>'Health House established as per given guidelines','name'=>'sr_r2_f1'),
			array('label'=>'Satisfactory knowledge of LHW','name'=>'sr_r3_f1'),
			array('label'=>'Satisfactory skills of LHW','name'=>'sr_r4_f1'),
			array('label'=>'Stipend received for the last month','name'=>'sr_r5_f1'),
			array('label'=>'Medicines and contraceptives are available','name'=>'sr_r6_f1'),
			array('label'=>'Correct maintenance of LHW-MIS instruments','name'=>'sr_r7_f1'),
			array('label'=>'Daily entries made in monthly report','name'=>'sr_r8_f1'),
			array('label'=>'Last monthly report submitted','name'=>'sr_r9_f1'),
			array('label'=>'Referrals being entertained by FLCF','name'=>'sr_r10_f1'),
		);
	public $gotools = array(
		array('label'=>'Sign Board','name'=>'sign_board'),
		array('label'=>'Sign Plates','name'=>'sign_plates'),
		array('label'=>'Education Material','name'=>'education_material'),
		array('label'=>'DHIS Tools','name'=>'dhis_tools'),
		array('label'=>'OPD registration Desk','name'=>'opd_reg_desk'),
		array('label'=>'Furniture','name'=>'furniture'),
		array('label'=>'Water','name'=>'water')
	);
	public $mitools = array(
		array('label'=>'Attendance Register','name'=>'mia_r1_f1'),
		array('label'=>'Visitor Book','name'=>'mia_r1_f2'),
		array('label'=>'Movement Book','name'=>'mia_r1_f3'),
		array('label'=>'Cash Book','name'=>'mia_r1_f4'),
		array('label'=>'Stock Register','name'=>'mia_r1_f5')
	);
	public $rctools = array(
			array('label'=>'Electricity','name'=>'or_r1_f1','sname'=>'or_r1_f2'),
			array('label'=>'Generators','name'=>'or_r2_f1','sname'=>'or_r2_f2'),
			array('label'=>'Other power supplies ','name'=>'or_r3_f1','sname'=>'or_r3_f2'),
			array('label'=>'Water supply ','name'=>'or_r4_f1','sname'=>'or_r4_f2'),
			array('label'=>'Telephone','name'=>'c_r1_f1','sname'=>'c_r1_f2'),
			array('label'=>'Fax','name'=>'c_r2_f1','sname'=>'c_r2_f2')
	);
	public $gstools = array(
		array('label'=>'OPD','name'=>'gs_r1_f1'),
		array('label'=>'Dispensary','name'=>'gs_r1_f2'),
		array('label'=>'ORT Corner','name'=>'gs_r1_f3'),
		array('label'=>'Laboratory','name'=>'gs_r1_f4')
	);
	public $sstools = array(
		array('label'=>'Family Planning','name'=>'ss_r1_f1'),
		array('label'=>'Labor Room','name'=>'ss_r1_f2'),
		array('label'=>'Dental','name'=>'ss_r1_f3'),
		array('label'=>'Operation Theatre','name'=>'ss_r1_f4'),
		array('label'=>'Indoor','name'=>'ss_r1_f5'),
		array('label'=>'Surgical Consultancy','name'=>'ss_r1_f6'),
		array('label'=>'Others','name'=>'ss_r1_f7')
	);
	public $pptools = array(
		array('label'=>'EPI','name'=>'pp_r1_f1'),
		array('label'=>'MNCH','name'=>'pp_r1_f2'),
		array('label'=>'Nutrition','name'=>'pp_r1_f3'),
		array('label'=>'TB','name'=>'pp_r1_f4'),
		array('label'=>'Malaria','name'=>'pp_r1_f5'),
		array('label'=>'Hepatitis','name'=>'pp_r1_f6'),
		array('label'=>'HIV','name'=>'pp_r1_f7')
	);
	public $epservice = array(
		array('label'=>'BCG scar verified children present at HF','name'=>'epi_r5_f1'),
		array('label'=>'Monthly Movement Plan available at HF','name'=>'epi_r6_f1'),
		array('label'=>'Cold Chain Maintained','name'=>'epi_r7_f1'),
		array('label'=>'All vaccines available','name'=>'epi_r8_f1'),
		array('label'=>'Permanent Register EPI available','name'=>'epi_r9_f1'),
		array('label'=>'Daily Register EPI available','name'=>'epi_r10_f1'),
		array('label'=>'Updated list of defaulters available','name'=>'epi_r11_f1')		
	);
	public $cltools = array(
		array('label'=>'Advance monthly program submitted by Malaria Supervisor','name'=>'cl_r1_f1'),
		array('label'=>'Malaria Supervisor collecting the blood slides for MP from FLCF regularly','name'=>'cl_r2_f1'),
		array('label'=>'Malaria Microscopist posted (Check this only in RHC & above HFs)','name'=>'cl_r3_f1'),
		array('label'=>'RDT performed','name'=>'cl_r4_f1')
	);
	public $indward = array(
		array('label'=>'Health education/Counseling material available','name'=>'indm_r3_f1','fname'=>'indf_r3_f1'),
		array('label'=>'Duty Doctor Desk available','name'=>'indm_r4_f1','fname'=>'indf_r4_f1'),
		array('label'=>'Nurse/Dispenser Desk available','name'=>'indm_r5_f1','fname'=>'indf_r5_f1'),
		array('label'=>'Indoor Register available','name'=>'indm_r6_f1','fname'=>'indf_r6_f1'),
		array('label'=>'Abstract Form available ','name'=>'indm_r7_f1','fname'=>'indf_r7_f1')
	);
	public $fitools = array(
		array('label'=>'Bed','name'=>'fam_r1_f1','fname'=>'faf_r1_f1'),
		array('label'=>'Side Table','name'=>'fam_r1_f2','fname'=>'faf_r1_f2'),
		array('label'=>'Screen','name'=>'fam_r1_f3','fname'=>'faf_r1_f3'),
		array('label'=>'Attend Bench','name'=>'fam_r1_f4','fname'=>'faf_r1_f4'),
		array('label'=>'Thermometer','name'=>'iam_r1_f1','fname'=>'iaf_r1_f1'),
		array('label'=>'Drip Stand','name'=>'iam_r1_f2','fname'=>'iaf_r1_f2'),
		array('label'=>'Flash Light','name'=>'iam_r1_f3','fname'=>'iaf_r1_f3'),
		array('label'=>'Sphygmomanometer','name'=>'iam_r1_f4','fname'=>'iaf_r1_f4'),
		array('label'=>'Stethoscope','name'=>'iam_r1_f5','fname'=>'iaf_r1_f5'),
		array('label'=>'Tuning Fork','name'=>'iam_r2_f1','fname'=>'iaf_r2_f1'),
		array('label'=>'Measuring Tape','name'=>'iam_r2_f2','fname'=>'iaf_r2_f2'),
		array('label'=>'Weight Machine','name'=>'iam_r2_f3','fname'=>'iaf_r2_f3'),
		array('label'=>'Ambu Bag','name'=>'iam_r2_f4','fname'=>'iaf_r2_f4'),
		array('label'=>'Resuscitation Board','name'=>'iam_r2_f5','fname'=>'iaf_r2_f5')
	);
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if(is_logged_in()){}else{
			redirect(base_url());exit;
		}
		$this -> load -> helper ('dashboard_functions_helper');
		$this -> load -> model ('Common_model');
		$this -> load -> model ('dashboard/Trend_model',"trend");
		$this -> load -> model ('dashboard/Checklists_model',"chklst");
	}
	public static function getcolor($vall){
		switch(true){
			case ($vall>=80):
				return '#006600';
			case ($vall>=60 && $vall<80):
				return '#8BD100';
			case ($vall>=40 && $vall<60):
				return '#FF8000';
			case ($vall>=20 && $vall<40):
				return '#fda813';
			case ($vall>=0 && $vall<20):
				return '#CC0000';
			default:
				return '';
		}
	}
	public function lqas()
	{
		$data = array();
		$data["pagetitle"] = "LQAS Checklists Trend";
		$data["currpage"] = "lqas";
		if($this->input->post("year")){
			$data["periodtext"] = "Year";
			$data["period"] = $year = $this->input->post("year");
		}else{
			$data["periodtext"] = "Year";
			$data["period"] = $year = date("Y");
		}	
		if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}	
		$checklistsdata = $this -> trend -> get_lqas_data($year,$distcode);
		$programs = array();
		$districts = array();
		foreach($checklistsdata as $onearr){
			$fmonth = $onearr["fmonth"];
			$splitted = explode("-",$fmonth);
			$mnth = $splitted[1];
			$qtr = ceil($splitted[1]/3);
			$q = $qtr-1;
			$m = $mnth-1;
			$data["plannedm"][$m]["value"] = isset($data["plannedm"][$m]["value"])?$data["plannedm"][$m]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["filledm"][$m]["value"] = isset($data["filledm"][$m]["value"])?$data["filledm"][$m]["value"]+$onearr["filled"]:$onearr["filled"];
			$data["plannedq"][$q]["value"] = isset($data["plannedq"][$q]["value"])?$data["plannedq"][$q]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["filledq"][$q]["value"] = isset($data["filledq"][$q]["value"])?$data["filledq"][$q]["value"]+$onearr["filled"]:$onearr["filled"];
			$distcode = $onearr["distcode"];
			if(in_array($distcode,$districts)){}else{
				$districts[] = $distcode;
				$data["districts"][] = array("label"=>($onearr["district"])?$onearr["district"]:"Provincial");
			}
			$keydist = array_search($distcode, $districts);
			$data["plannedd"][$keydist]["value"] = isset($data["plannedd"][$keydist]["value"])?$data["plannedd"][$keydist]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["filledd"][$keydist]["value"] = isset($data["filledd"][$keydist]["value"])?$data["filledd"][$keydist]["value"]+$onearr["filled"]:$onearr["filled"];
			$ptype = $onearr["ptype"];
			if(in_array($ptype,$programs)){}else{
				$programs[] = $ptype;
				$data["programs"][] = array("label"=>$ptype);
			}
			$key = array_search($ptype, $programs);
			$data["plannedp"][$key]["value"] = isset($data["plannedp"][$key]["value"])?$data["plannedp"][$key]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["plannedp"][$key]["link"] = "JavaScript:drilldownfun('ptype','$ptype')";
			$data["filledp"][$key]["value"] = isset($data["filledp"][$key]["value"])?$data["filledp"][$key]["value"]+$onearr["filled"]:$onearr["filled"];
			$data["pmonthly"]["planned_".$ptype][$m]["value"] = isset($data["pmonthly"]["planned_".$ptype][$m]["value"])?$data["pmonthly"]["planned_".$ptype][$m]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["pmonthly"]["filled_".$ptype][$m]["value"] = isset($data["pmonthly"]["filled_".$ptype][$m]["value"])?$data["pmonthly"]["filled_".$ptype][$m]["value"]+$onearr["filled"]:$onearr["filled"];
			$data["pdistricts"]["planned_".$ptype][$keydist]["value"] = isset($data["pdistricts"]["planned_".$ptype][$keydist]["value"])?$data["pdistricts"]["planned_".$ptype][$keydist]["value"]+$onearr["planned"]:$onearr["planned"];
			$data["pdistricts"]["filled_".$ptype][$keydist]["value"] = isset($data["pdistricts"]["filled_".$ptype][$keydist]["value"])?$data["pdistricts"]["filled_".$ptype][$keydist]["value"]+$onearr["filled"]:$onearr["filled"];
		}
		$this->load->view('dashboard/checklists/lqas',$data);
	}
	public function imc_gois($param=null)
	{
		$data = array();
		$shared="m&s#98765";
		$key=sha1(md5($shared.date("Y-m-d")));
		$data['dhiscode']=(isset($param) && $param==$key)?true:false;
		$data['domain'] = $this->session->userdata('domain');
		$data["pagetitle"] = "General Outlook - Instrument and Service Availability Checklist";
		$data["currpage"] = "imc";
		$data["target"] = "gois";
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					$data["attr"] = "qmonth";
					$data["htmloptions"] = getAllQuarterOptions(true,isset($period)?$period:NULL);
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $period = $fmonth;
			$data["attr"] = "fmonth";
			$data["htmloptions"] = getFmonthIncludingCurrentMonth_options(true,isset($period)?$period:NULL);
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		
		$ulevel = $this -> session -> userLevel;
		if($ulevel>2){
			$data["distcode"] = $distcode = $this -> session -> distcode;
		}
		else if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		
		$checklistdata = $this -> chklst -> get_imc_gois_data($fmonth,$distcode,$customfmonthwc);
		$scores = array(
			array('label'=>'80-100%','name'=>'greater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'greater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'greater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'greater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'greater0','color'=>'#CC0000')
		);
		$shortnames = array("go","mi","gs","ss","pp");
		foreach($shortnames as $onename){
			$data[$onename.'tools_cats'] = $data[$onename.'scores_cats'] = array();	
		}
		$rcscores = array(
			array('label'=>'80-100%','name'=>'rcagreater80','sname'=>'rcfgreater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'rcagreater60','sname'=>'rcfgreater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'rcagreater40','sname'=>'rcfgreater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'rcagreater20','sname'=>'rcfgreater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'rcagreater0','sname'=>'rcfgreater0','color'=>'#CC0000')
		);
		$data['rctools_cats'] = $data['rcscores_cats'] = array();
		$gotools = $this->gotools;$mitools = $this->mitools;$rctools = $this->rctools;$gstools = $this->gstools;$pptools = $this->pptools;$sstools = $this->sstools;
		$data['districts'] = array_map(function($v) use(&$data,$shortnames,$scores,$gotools,$mitools,$gstools,$pptools,$sstools,$rctools,$rcscores,$distcode) {
			//for district wise planned/filled
			//$data["planned"][]["value"]	= $v["planned"];
			$data["planned"][]	= array("value"=>$v["planned"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			//$data["filled"][]["value"]		= $v["filled"];
			$data["filled"][]	= array("value"=>$v["filled"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$notfilled = $v["planned"]-$v["filled"];
			$totfilled = $data["totfilled"] = isset($data["totfilled"])?$data["totfilled"]+$v["filled"]:$v["filled"];
			//common			
			foreach($shortnames as $shortkey => $name){
				foreach($scores as $key=>$val){
					$data[$name."scores_cats"][$key]["label"] = $val["label"];
					$data[$name."scores_num"][$key]["value"] = isset($data[$name."scores_num"][$key]["value"])?$data[$name."scores_num"][$key]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data[$name."scores_num"][$key]["color"] = $val["color"];
					$data[$name."scores_num"][$key]["label"] = $val["label"];
					//for section wise
					$data["scores_num_".$val["name"]][$shortkey]["value"] = isset($data["scores_num_".$val["name"]][$shortkey]["value"])?$data["scores_num_".$val["name"]][$shortkey]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data["scores_num_".$val["name"]][$shortkey]["color"] = $val["color"];
				}
				$data[$name."scores_num"][$key]["value"] = $data[$name."scores_num"][$key]["value"]-$notfilled;
				$data["scores_num_".$val["name"]][$shortkey]["value"] = $data["scores_num_".$val["name"]][$shortkey]["value"]-$notfilled;
			}
			foreach($gotools as $key=>$val){
				$short = &$data["gotools_num"][$key];
				$data["gotools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','gotools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','gotools')");
				}
			}
			foreach($mitools as $key=>$val){
				$short = &$data["mitools_num"][$key];
				$data["mitools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','mitools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','mitools')");
				}
			}
			foreach($gstools as $key=>$val){
				$short = &$data["gstools_num"][$key];
				$data["gstools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','gstools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','gstools')");
				}
			}
			foreach($sstools as $key=>$val){
				$short = &$data["sstools_num"][$key];
				$data["sstools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','sstools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','sstools')");
				}
			}
			foreach($pptools as $key=>$val){
				$short = &$data["pptools_num"][$key];
				$data["pptools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','pptools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','pptools')");
				}
			}
			foreach($rctools as $key=>$val){
				$short = &$data["rctools_num"][$key];
				$short1 = &$data["rcftools_num"][$key];
				$data["rctools_cats"][$key]["label"] = $val["label"];
				$data["rctools_num"][$key]["value"] = isset($data["rctools_num"][$key]["value"])?$data["rctools_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["rcftools_num"][$key]["value"] = isset($data["rcftools_num"][$key]["value"])?$data["rcftools_num"][$key]["value"]+$v[$val["sname"]]:$v[$val["sname"]];
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','rctools')";
					$short1["link"] = "JavaScript:func_list('imc_gois','".$v["distcode"]."','rctools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["sname"]."','".$val["label"]."')";
					$short1["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["sname"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$percentsf = ($v["filled"]!=0)?round(($v[$val["sname"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','rctools')");
					$data["singletooldist"][$val["sname"]][] = array("value"=>$percentsf,"color" => Checklists::getcolor($percentsf),"displayValue"=>$percentsf."% (".$v[$val["sname"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_gois','".$v["distcode"]."','rctools')");
				}
			}
			foreach($rcscores as $key=>$val){
				$data["rcscores_cats"][$key]["label"] = $val["label"];
				$data["rcscores_num"][$key]["value"] = isset($data["rcscores_num"][$key]["value"])?$data["rcscores_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["rcfscores_num"][$key]["value"] = isset($data["rcfscores_num"][$key]["value"])?$data["rcfscores_num"][$key]["value"]+$v[$val["sname"]]:$v[$val["sname"]];
				$data["rcscores_num"][$key]["color"] = $data["rcfscores_num"][$key]["color"] = $val["color"];
				$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = isset($data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"])?$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = isset($data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"])?$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]+$v[$val["sname"]]:$v[$val["sname"]];
				$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["color"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["color"] = $val["color"];
			}
			$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]-$notfilled;
			$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]-$notfilled;
			$data["rcscores_num"][$key]["value"] = $data["rcscores_num"][$key]["value"]-$notfilled;
			$data["rcfscores_num"][$key]["value"] = $data["rcfscores_num"][$key]["value"]-$notfilled;
			return array("label"=>$v['district']);
		}, $checklistdata);
		$this->load->view('dashboard/checklists/imc_gois',$data);
	}
	
	public function imc_epi()
	{
		$data = array();
		$data["pagetitle"] = "EPI Services Checklist";
		$data["currpage"] = "facilities";
		$data["target"] = "epi";
		$data['domain'] = $this->session->userdata('domain');
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					$data["attr"] = "qmonth";
					$data["htmloptions"] = getAllQuarterOptions(true,isset($period)?$period:NULL);
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $period = $fmonth;
			$data["attr"] = "fmonth";
			$data["htmloptions"] = getFmonthIncludingCurrentMonth_options(true,isset($period)?$period:NULL);
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$ulevel = $this -> session -> userLevel;
		if($ulevel>2){
			$data["distcode"] = $distcode = $this -> session -> distcode;
		}
		else if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		$checklistdata = $this -> chklst -> get_imc_epi_data($fmonth,$distcode,$customfmonthwc);
		$scores = array(
			array('label'=>'80-100%','name'=>'greater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'greater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'greater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'greater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'greater0','color'=>'#CC0000')
		);
		$shortnames = array("ep");
		foreach($shortnames as $onename){
			$data[$onename.'tools_cats'] = $data[$onename.'scores_cats'] = array();	
		}
		$epservice = $this->epservice;
		$data['districts'] = array_map(function($v) use(&$data,$shortnames,$scores,$epservice,$ulevel,$distcode) {
			$data["planned"][]	= array("value"=>$v["planned"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$data["filled"][]	= array("value"=>$v["filled"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$notfilled = $v["planned"]-$v["filled"];
			$totfilled = $data["totfilled"] = isset($data["totfilled"])?$data["totfilled"]+$v["filled"]:$v["filled"];
			foreach($shortnames as $shortkey => $name){
				foreach($scores as $key=>$val){
					$data[$name."scores_cats"][$key]["label"] = $val["label"];
					$data[$name."scores_num"][$key]["value"] = isset($data[$name."scores_num"][$key]["value"])?$data[$name."scores_num"][$key]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data[$name."scores_num"][$key]["color"] = $val["color"];
					$data[$name."scores_num"][$key]["label"] = $val["label"];
					$data["scores_num_".$val["name"]][$shortkey]["value"] = isset($data["scores_num_".$val["name"]][$shortkey]["value"])?$data["scores_num_".$val["name"]][$shortkey]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data["scores_num_".$val["name"]][$shortkey]["color"] = $val["color"];
				}
				$data[$name."scores_num"][$key]["value"] = $data[$name."scores_num"][$key]["value"]-$notfilled;
				$data["scores_num_".$val["name"]][$shortkey]["value"] = $data["scores_num_".$val["name"]][$shortkey]["value"]-$notfilled;
			}
			foreach($epservice as $key=>$val){
				$short = &$data["eptools_num"][$key];
				$data["eptools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$percents = ($totfilled!=0)?round($short["value"]/$totfilled*100,1):0;
				$short["displayValue"] = $short["value"].', '.($percents)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_epi','".$v["distcode"]."','epservice')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_epi','".$v["distcode"]."','epservice')");
				}
			}
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]-$notfilled;
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]-$notfilled;
			return array("label"=>$v['district']);
		}, $checklistdata);
		$this->load->view('dashboard/checklists/imc_epi',$data);
	}
	public function imc_malaria()
	{
		$data = array();
		$data["pagetitle"] = "Malaria Services Checklist";
		$data["currpage"] = "facilities";
		$data["target"] = "malaria";
		$data['domain'] = $this->session->userdata('domain');
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					$data["attr"] = "qmonth";
					$data["htmloptions"] = getAllQuarterOptions(true,isset($period)?$period:NULL);
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $period = $fmonth;
			$data["attr"] = "fmonth";
			$data["htmloptions"] = getFmonthIncludingCurrentMonth_options(true,isset($period)?$period:NULL);
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$ulevel = $this -> session -> userLevel;
		if($ulevel>2){
			$data["distcode"] = $distcode = $this -> session -> distcode;
		}
		else if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		$checklistdata = $this -> chklst -> get_imc_malaria_data($fmonth,$distcode,$customfmonthwc);
		$scores = array(
			array('label'=>'80-100%','name'=>'greater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'greater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'greater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'greater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'greater0','color'=>'#CC0000')
		);
		$shortnames = array("ms");
		foreach($shortnames as $onename){
			$data[$onename.'tools_cats'] = $data[$onename.'scores_cats'] = array();	
		}
	
	$cltools = $this->cltools;
		$data['districts'] = array_map(function($v) use(&$data,$shortnames,$scores,$cltools,$ulevel,$distcode) {
			//$data["planned"][]["value"]	= $v["planned"];
			$data["planned"][]	= array("value"=>$v["planned"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			//$data["filled"][]["value"]	= $v["filled"];
			$data["filled"][]	= array("value"=>$v["filled"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$notfilled = $v["planned"]-$v["filled"];
			$totfilled = $data["totfilled"] = isset($data["totfilled"])?$data["totfilled"]+$v["filled"]:$v["filled"];
			foreach($shortnames as $shortkey => $name){
				foreach($scores as $key=>$val){
					$data[$name."scores_cats"][$key]["label"] = $val["label"];
					$data[$name."scores_num"][$key]["value"] = isset($data[$name."scores_num"][$key]["value"])?$data[$name."scores_num"][$key]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data[$name."scores_num"][$key]["color"] = $val["color"];
					$data[$name."scores_num"][$key]["label"] = $val["label"];
					$data["scores_num_".$val["name"]][$shortkey]["value"] = isset($data["scores_num_".$val["name"]][$shortkey]["value"])?$data["scores_num_".$val["name"]][$shortkey]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data["scores_num_".$val["name"]][$shortkey]["color"] = $val["color"];
				}
				$data[$name."scores_num"][$key]["value"] = $data[$name."scores_num"][$key]["value"]-$notfilled;
				//$data[$name."scores_num"][$key+1]["value"] = $data[$name."scores_num"][$key+1]["value"]-$notfilled;
				//$data[$name."scores_num"][$key+2]["value"] = $data[$name."scores_num"][$key+2]["value"]-$notfilled;
				$data["scores_num_".$val["name"]][$shortkey]["value"] = $data["scores_num_".$val["name"]][$shortkey]["value"]-$notfilled;
			}
			foreach($cltools as $key=>$val){
				$short = &$data["mstools_num"][$key];
				$data["mstools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$percents = ($totfilled!=0)?round($short["value"]/$totfilled*100,1):0;
				$short["displayValue"] = $short["value"].', '.($percents)."%";
			if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_malaria','".$v["distcode"]."','cltools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_malaria','".$v["distcode"]."','cltools')");
				}
			}
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]-$notfilled;
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]-$notfilled;
			return array("label"=>$v['district']);
		}, $checklistdata);
		$this->load->view('dashboard/checklists/imc_malaria',$data);
	}
	public function imc_indoor()
	{
		$data = array();
		$data["pagetitle"] = "General Services – Indoor Ward Checklist";
		$data["currpage"] = "facilities";
		$data["target"] = "indoor";
		$data['domain'] = $this->session->userdata('domain');
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					$data["attr"] = "fyear";
					$data["htmloptions"] = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					$data["attr"] = "qmonth";
					$data["htmloptions"] = getAllQuarterOptions(true,isset($period)?$period:NULL);
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $period = $fmonth;
			$data["attr"] = "fmonth";
			$data["htmloptions"] = getFmonthIncludingCurrentMonth_options(true,isset($period)?$period:NULL);
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$ulevel = $this -> session -> userLevel;
		if($ulevel>2){
			$data["distcode"] = $distcode = $this -> session -> distcode;
		}
		else if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		$checklistdata = $this -> chklst -> get_imc_indoor_data($fmonth,$distcode,$customfmonthwc);
		$scores = array(
			array('label'=>'80-100%','name'=>'greater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'greater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'greater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'greater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'greater0','color'=>'#CC0000')
		);
		$wardscores = array(
			array('label'=>'80-100%','name'=>'indmgreater80','fname'=>'indfgreater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'indmgreater60','fname'=>'indfgreater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'indmgreater40','fname'=>'indfgreater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'indmgreater20','fname'=>'indfgreater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'indmgreater0','fname'=>'indfgreater0','color'=>'#CC0000')
		);
		$shortnames = array("indm","fim");
		foreach($shortnames as $onename){
			$data[$onename.'tools_cats'] = $data[$onename.'scores_cats'] = array();	
		}
		$indward = $this->indward; $fitools = $this->fitools;
		$data['districts'] = array_map(function($v) use(&$data,$shortnames,$scores,$wardscores,$indward,$fitools,$ulevel,$distcode) {
			//$data["planned"][]["value"]	= $v["planned"];
			$data["planned"][]	= array("value"=>$v["planned"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			//$data["filled"][]["value"]	= $v["filled"];
			$data["filled"][]	= array("value"=>$v["filled"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$notfilled = $v["planned"]-$v["filled"];
			$totfilled = $data["totfilled"] = isset($data["totfilled"])?$data["totfilled"]+$v["filled"]:$v["filled"];
			foreach($shortnames as $shortkey => $name){
				foreach($scores as $key=>$val){
					$data[$name."scores_cats"][$key]["label"] = $val["label"];
					$data[$name."scores_num"][$key]["value"] = isset($data[$name."scores_num"][$key]["value"])?$data[$name."scores_num"][$key]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data[$name."scores_num"][$key]["color"] = $val["color"];
					$data[$name."scores_num"][$key]["label"] = $val["label"];
					//for section wise
					$data["scores_num_".$val["name"]][$shortkey]["value"] = isset($data["scores_num_".$val["name"]][$shortkey]["value"])?$data["scores_num_".$val["name"]][$shortkey]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data["scores_num_".$val["name"]][$shortkey]["color"] = $val["color"];
				}
				$data[$name."scores_num"][$key]["value"] = $data[$name."scores_num"][$key]["value"]-$notfilled;
				$data["scores_num_".$val["name"]][$shortkey]["value"] = $data["scores_num_".$val["name"]][$shortkey]["value"]-$notfilled;
			}
			foreach($indward as $key=>$val){
				$short = &$data["indtools_num"][$key];
				$short1 = &$data["indftools_num"][$key];
				$data["indtools_cats"][$key]["label"] = $val["label"];
				$data["indtools_num"][$key]["value"] = isset($data["indtools_num"][$key]["value"])?$data["indtools_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["indftools_num"][$key]["value"] = isset($data["indftools_num"][$key]["value"])?$data["indftools_num"][$key]["value"]+$v[$val["fname"]]:$v[$val["fname"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				$short1["displayValue"] = $short1["value"].', '.(($totfilled!=0)?round($short1["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_indoor','".$v["distcode"]."','indward')";
					$short1["link"] = "JavaScript:func_list('imc_indoor','".$v["distcode"]."','indward')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["fname"]."','".$val["label"]."')";
					$short1["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["fname"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$percentsf = ($v["filled"]!=0)?round(($v[$val["fname"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_indoor','".$v["distcode"]."','indward')");
					$data["singletooldist"][$val["fname"]][] = array("value"=>$percentsf,"color" => Checklists::getcolor($percentsf),"displayValue"=>$percentsf."% (".$v[$val["fname"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_indoor','".$v["distcode"]."','indward')");
				}
			}
			foreach($fitools as $key=>$val){
				$short = &$data["fitools_num"][$key];
				$short1 = &$data["fiftools_num"][$key];
				$data["fitools_cats"][$key]["label"] = $val["label"];
				$data["fitools_num"][$key]["value"] = isset($data["fitools_num"][$key]["value"])?$data["fitools_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["fiftools_num"][$key]["value"] = isset($data["fiftools_num"][$key]["value"])?$data["fiftools_num"][$key]["value"]+$v[$val["fname"]]:$v[$val["fname"]];
				$short["displayValue"] = $short["value"].', '.(($totfilled!=0)?round($short["value"]/$totfilled*100,1):0)."%";
				$short1["displayValue"] = $short1["value"].', '.(($totfilled!=0)?round($short1["value"]/$totfilled*100,1):0)."%";
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('imc_indoor','".$v["distcode"]."','fitools')";
					$short1["link"] = "JavaScript:func_list('imc_indoor','".$v["distcode"]."','fitools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["fname"]."','".$val["label"]."')";
					$short1["link"] = "JavaScript:drilldownfun1('district','".$val["name"]."','".$val["fname"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$percentsf = ($v["filled"]!=0)?round(($v[$val["fname"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_indoor','".$v["distcode"]."','fitools')");
					$data["singletooldist"][$val["fname"]][] = array("value"=>$percentsf,"color" => Checklists::getcolor($percentsf),"displayValue"=>$percentsf."% (".$v[$val["fname"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('imc_indoor','".$v["distcode"]."','fitools')");
				}
			}
			foreach($wardscores as $key=>$val){
				$data["indscores_cats"][$key]["label"] = $val["label"];
				$data["indfscores_cats"][$key]["label"] = $val["label"];
				$data["indscores_num"][$key]["value"] = isset($data["indscores_num"][$key]["value"])?$data["indscores_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["indfscores_num"][$key]["value"] = isset($data["indfscores_num"][$key]["value"])?$data["indfscores_num"][$key]["value"]+$v[$val["fname"]]:$v[$val["fname"]];
				$data["indscores_num"][$key]["color"] = $data["indfscores_num"][$key]["color"] = $val["color"];
				
				$data["fiscores_cats"][$key]["label"] = $val["label"];
				$data["fifscores_cats"][$key]["label"] = $val["label"];
				$data["fiscores_num"][$key]["value"] = isset($data["fiscores_num"][$key]["value"])?$data["fiscores_num"][$key]["value"]+$v[$val["name"]]:$v[$val["name"]];
				$data["fifscores_num"][$key]["value"] = isset($data["fifscores_num"][$key]["value"])?$data["fifscores_num"][$key]["value"]+$v[$val["fname"]]:$v[$val["fname"]];
				$data["fiscores_num"][$key]["color"] = $data["fifscores_num"][$key]["color"] = $val["color"];
			}
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]-$notfilled;
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]-$notfilled;
			return array("label"=>$v['district']);
		}, $checklistdata);
		$this->load->view('dashboard/checklists/imc_indoor',$data);
	}
	public function lhw_lhw()
	{
		$data = array();
		$data["pagetitle"] = "Health House & Lady Health Worker";
		$data["currpage"] = "lhw";
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $fmonth;
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$ulevel = $this -> session -> userLevel;
		if($ulevel>2){
			$data["distcode"] = $distcode = $this -> session -> distcode;
		}
		else if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}		
		$checklistdata = $this -> chklst -> get_lhw_lhw_data($fmonth,$distcode,$customfmonthwc);
		$scores = array(
			array('label'=>'80-100%','name'=>'greater80','color'=>'#006600'),
			array('label'=>'60-80%','name'=>'greater60','color'=>'#8BD100'),
			array('label'=>'40-60%','name'=>'greater40','color'=>'#FF8000'),
			array('label'=>'20-40%','name'=>'greater20','color'=>'#fda813'),
			array('label'=>'0-20%','name'=>'greater0','color'=>'#CC0000')
		);
		$shortnames = array("sr");
		foreach($shortnames as $onename){
			$data[$onename.'tools_cats'] = $data[$onename.'scores_cats'] = array();	
		}
		$srtools = $this->srtools;
		$data['districts'] = array_map(function($v) use(&$data,$shortnames,$scores,$srtools,$ulevel,$distcode) {
			//$data["planned"][]["value"]	= $v["planned"];
			$data["planned"][]	= array("value"=>$v["planned"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			//$data["filled"][]["value"]	= $v["filled"];
			$data["filled"][]	= array("value"=>$v["filled"],"link"=>"JavaScript:districtview(".$v["distcode"].")");
			$notfilled = $v["planned"]-$v["filled"];
			$totfilled = $data["totfilled"] = isset($data["totfilled"])?$data["totfilled"]+$v["filled"]:$v["filled"];
			foreach($shortnames as $shortkey => $name){
				foreach($scores as $key=>$val){
					$data[$name."scores_cats"][$key]["label"] = $val["label"];
					$data[$name."scores_num"][$key]["value"] = isset($data[$name."scores_num"][$key]["value"])?$data[$name."scores_num"][$key]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data[$name."scores_num"][$key]["color"] = $val["color"];
					$data[$name."scores_num"][$key]["label"] = $val["label"];
					//for section wise
					$data["scores_num_".$val["name"]][$shortkey]["value"] = isset($data["scores_num_".$val["name"]][$shortkey]["value"])?$data["scores_num_".$val["name"]][$shortkey]["value"]+$v[$name.$val["name"]]:$v[$name.$val["name"]];
					$data["scores_num_".$val["name"]][$shortkey]["color"] = $val["color"];
				}
				$data[$name."scores_num"][$key]["value"] = $data[$name."scores_num"][$key]["value"]-$notfilled;
				//$data[$name."scores_num"][$key+1]["value"] = $data[$name."scores_num"][$key+1]["value"]-$notfilled;
				//$data[$name."scores_num"][$key+2]["value"] = $data[$name."scores_num"][$key+2]["value"]-$notfilled;
				$data["scores_num_".$val["name"]][$shortkey]["value"] = $data["scores_num_".$val["name"]][$shortkey]["value"]-$notfilled;
			}
			foreach($srtools as $key=>$val){
				$short = &$data["srtools_num"][$key];
				$data["srtools_cats"][$key]["label"] = $val["label"];
				$short["value"] = isset($short["value"])?$short["value"]+$v[$val["name"]]:$v[$val["name"]];
				$percents = ($totfilled!=0)?round($short["value"]/$totfilled*100,1):0;
				$short["displayValue"] = $short["value"].', '.($percents)."%";
				//for districts wise drill down
				if($distcode && $distcode>0){
					$short["link"] = "JavaScript:func_list('lhw_lhw','".$v["distcode"]."','srtools')";
				}
				else {
					$short["link"] = "JavaScript:drilldownfun('district','".$val["name"]."','".$val["label"]."')";
					$percents = ($v["filled"]!=0)?round(($v[$val["name"]]/$v["filled"])*100,1):0;
					$data["singletooldist"][$val["name"]][] = array("value"=>$percents,"color" => Checklists::getcolor($percents),"displayValue"=>$percents."% (".$v[$val["name"]]."/".$v["filled"].")","link"=>"JavaScript:func_list('lhw_lhw','".$v["distcode"]."','srtools')");
				}
			}
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+1]["value"]-$notfilled;
			//$data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"] = $data["scores_num_".$scores[$key]["name"]][$shortkey+2]["value"]-$notfilled;
			return array("label"=>$v['district']);
		}, $checklistdata);
		$this->load->view('dashboard/checklists/lhw_lhw',$data);
	}
	public function lhwlist()
	{
		$data = array();
		$data["tablee"] = $tablee = $this->input->post("checklistname");
		switch($tablee){
			case 'lhw_lhw': 
				$data["pagetitle"] = "Health House & Lady Health Worker";
				$data["currpage"] = "lhw";
				$target="lhwlist";
				$colums = "*,lhwname(lhwcode) as lhwname,facilityname(facode) as facility";
				break;
			case 'imc_gois': 
				$data["pagetitle"] = "General Outlook - Instrument and Service Availability Checklist";
				$data["currpage"] = "facilities";
				$target="faclist";
				$colums = "*,facode,facilityname(facode) as facility";
				break;
			case 'imc_epi': 
				$data["pagetitle"] = "EPI Service Checklist";
				$data["currpage"] = "facilities";
				$target="faclist";
				$colums = "*,facode,facilityname(facode) as facility";
				break;
			case 'imc_malaria': 
				$data["pagetitle"] = "Malaria Service Checklist";
				$data["currpage"] = "facilities";
				$target="faclist";
				$colums = "*,facode,facilityname(facode) as facility";
				break;
			case 'imc_indoor': 
				$data["pagetitle"] = "General Services – Indoor Ward Checklist";
				$data["currpage"] = "facilities";
				$target="faclist";
				$colums = "*,facode,facilityname(facode) as facility";
				break;
		}
		$frequency = ($this -> input -> post('frequency'))?$this -> input -> post('frequency'):"y";
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = ($this -> input -> post('fyear'))?$this -> input -> post('fyear'):date("Y");
					if($fyear > 0){
						$customfmonthwc = " and ( fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( fmonth like '".date("Y")."-%' ) ";
					}
					$data["periodtext"] = "Year";
					$data["period"] = $fyear;
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( fmonth > '".$bothyears[0]."-06' and fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( fmonth > '".$startyear."-06' and fmonth < '".$endyear."-07' ) ";
					}
					$data["periodtext"] = "Fiscal Year";
					$data["period"] = $years;
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( fmonth > \''.$year.'-'.$startmonth.'\' and fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( fmonth > \''.$year.'-'.$startmonth.'\' and fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["periodtext"] = "Year-Quarter";
					$data["period"] = $qmonth;
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["periodtext"] = "Year-Month";
			$data["period"] = $fmonth;
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		
		if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		$checklistid = $this->input->post("checklist");
		$data["checklistdata"] = $this -> chklst -> get_lhwlist($tablee,$colums,$fmonth,$distcode,$customfmonthwc);
		//Labels setting
		$postedlabelname = $this->input->post("secname");
		$data["labels"] = ($postedlabelname)?$this->{$postedlabelname}:'';
		$this->load->view('dashboard/checklists/'.$target,$data);
	}
}