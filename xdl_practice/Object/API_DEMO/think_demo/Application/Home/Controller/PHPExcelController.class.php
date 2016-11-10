<?php
namespace Home\Controller;

use \Think\Controller;

class PHPExcelController extends Controller{

	/**
	 * 文本输出csv
	 */
	public function setHeader(){
		header("Content-type:application/vnd.ms-excel; charset=UTF-8");
        header("Content-Disposition:filename=account_list.xls");

		$data = M('grade')->select();

		$title = array('姓名', '数学', '语文', '英语', '总分', '平均分');

		echo implode("\t", $title)."\n";
		foreach ($data as $v) {
			$sum = $v['math']+$v['chinese']+$v['english'];
			$avg = sprintf('%.2f', $sum / 3);
			echo $v['name']."\t";
			echo $v['math']."\t";
			echo $v['chinese']."\t";
			echo $v['english']."\t";
			echo $sum."\t";
			echo $avg."\t";
			echo "\n";

		}


		/* gbk
		echo iconv('utf-8', 'gbk', implode("\t", $title)."\n");

		foreach ($data as $v) {
			echo iconv('utf-8', 'gbk', $v['name']."\t");
			echo iconv('utf-8', 'gbk', $v['math']."\t");
			echo iconv('utf-8', 'gbk', $v['chinese']."\t");
			echo iconv('utf-8', 'gbk', $v['english']."\t");
			echo "\n";
		}
		*/

	}

    public function excel(){

        $m_exportType = "excel";
        $m_exportType = "excel";
        $filename = "test.xls";

        // PHPExcel
		require "./Application/Common/Vendor/PHPExcel_1.8.0/Classes/PHPExcel.php";
		// 生成新的excel对象
		$objPHPExcel = new \PHPExcel();

		// 设置excel文档的属性
		$objPHPExcel->getProperties()->setCreator("Sam.c")
		             ->setLastModifiedBy("Sam.c Test")
		             ->setTitle("Microsoft Office Excel Document")
		             ->setSubject("Test")
		             ->setDescription("Test")
		             ->setKeywords("Test")
		             ->setCategory("Test result file");
		// 开始操作excel表
		// 操作第一个工作表
		$objPHPExcel->setActiveSheetIndex(0);

		//获取当前的sheet工作表
		$activeSheet = $objPHPExcel->getActiveSheet();

		$activeSheet->setTitle('phpexcel测试');
		// 设置默认字体和大小
		$objPHPExcel->getDefaultStyle()->getFont()->setName('宋体');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);



		//设置第一列的宽度：
		$activeSheet->getColumnDimension('A')->setWidth(15);
		//设置第二列宽度
		$activeSheet->getColumnDimension('B')->setWidth(15);


		//设置第六行的高度：
		$activeSheet->getRowDimension('6')->setRowHeight(30);



		//合并单元格：
		$activeSheet->mergeCells('A1:C1');
		$activeSheet->mergeCells('A7:A10');


		//设置 单元格 加粗 居中
		$styleArray = array(
		  'font' => array(
		    'bold' => true,
		    'size'=>12,
		    'color'=>array(
		      'argb' => '00000000',
		    ),
		  ),
		  'alignment' => array(
		    'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		  ),
		);
		// 将A2单元格设置为加粗，居中
		$activeSheet->getStyle('A2')->applyFromArray($styleArray);


		//给单元格 写入内容
		$activeSheet->setCellValue('C4', 'Hello');
		$activeSheet->setCellValue('A6', '艳艳');
		$activeSheet->setCellValue('D7', 'Sxx');
		$activeSheet->setCellValue('D8', 'CASE2');



		//设置单元格样式 水平/垂直 居中
		$activeSheet->getStyle('A6')->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
  		$activeSheet->getStyle('A6')->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);



  		//设置单元格样式（黑色字体）：
		$activeSheet->getStyle('D8')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_BLACK); // 黑色


		//设置单元格格式（背景）：
		$activeSheet->getStyle('D8')->getFill()->getStartColor()->setARGB('00ff99cc'); // 将背景设置为浅粉色

		//设置单元格格式（数字格式）：
		$activeSheet->getStyle('D9')->getNumberFormat()->setFormatCode('0.000');


		// 将数据中心图片放在J1单元格内
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$objDrawing->setPath('./Public/images/test.jpg');
		//$objDrawing->setWidth(400);
		//$objDrawing->setHeight(123);
		$objDrawing->setCoordinates('D10');
		$objDrawing->setWorksheet($activeSheet);

		//在单元格中设置 超链接
		$activeSheet->setCellValue('E3', 'lamp兄弟连');
		$activeSheet->getCell('E3')->getHyperlink()->setUrl('http://www.itxdl.cn');
		//设置单元格样式（红色字体）：
		$activeSheet->getStyle('E3')->getFont()->getColor()->setARGB(\PHPExcel_Style_Color::COLOR_RED); // 黑色



		//设置单元格 边框
		$styleThinBlackBorderOutline = array(
		    'borders' => array (
		       'outline' => array (
		          'style' => \PHPExcel_Style_Border::BORDER_THIN,  //设置border样式
		          //'style' => PHPExcel_Style_Border::BORDER_THICK, 另一种样式
		          'color' => array ('argb' => 'FF000000'),     //设置border颜色
		      ),
		   ),
		);
		$activeSheet->getStyle( 'A4:E10')->applyFromArray($styleThinBlackBorderOutline);


		//添加一个新的worksheet
	    $objPHPExcel->createSheet();
	    $objActSheet = $objPHPExcel->getSheet(1);
	    $objActSheet->setTitle('新表');

	    $objActSheet->setCellValue('A1', '我是新表Hello Baby');

		// 如果需要输出EXCEL格式
		if($m_exportType=="excel"){
		    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		    // 从浏览器直接输出$filename
		    header("Pragma: public");
		    header("Expires: 0");
		    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		    header("Content-Type:application/force-download");
		    header("Content-Type: application/vnd.ms-excel;");
		    header("Content-Type:application/octet-stream");
		    header("Content-Type:application/download");
		    header("Content-Disposition:attachment;filename=".$filename);
		    header("Content-Transfer-Encoding:binary");
		    $objWriter->save("php://output");
		    //或者
		}
		// 如果需要输出PDF格式
		if($m_exportType=="pdf"){
		    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		    $objWriter->setSheetIndex(0);
		    header("Pragma: public");
		    header("Expires: 0");
		    header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
		    header("Content-Type:application/force-download");
		    header("Content-Type: application/pdf");
		    header("Content-Type:application/octet-stream");
		    header("Content-Type:application/download");
		    header("Content-Disposition:attachment;filename=".$m_strOutputPdfFileName);
		    header("Content-Transfer-Encoding:binary");
		    $objWriter->save("php://output");
		}
    }


    //导出表单数据
    public function table(){
        //把成绩信息导出到excel
        $model = M('grade');

        $data = $model->select();;

        //把数据导出到excel
        // PHPExcel
      		require "./Application/Common/Vendor/PHPExcel_1.8.0/Classes/PHPExcel.php";

        // 生成新的excel对象
        $objPHPExcel = new \PHPExcel();


        // 设置excel文档的属性
        $objPHPExcel->getProperties()->setCreator("Sam.c")
                     ->setLastModifiedBy("Sam.c Test")
                     ->setTitle("Microsoft Office Excel Document")
                     ->setSubject("Test")
                     ->setDescription("Test")
                     ->setKeywords("Test")
                     ->setCategory("Test result file");



        //=====================================================================
        // 开始操作excel表
        // 操作第一个工作表
        $objPHPExcel->setActiveSheetIndex(0);

        //获取当前的sheet工作表
        $activeSheet = $objPHPExcel->getActiveSheet();


        //设置当前的工作表
        $activeSheet->setTitle('学生成绩表');
        // 设置默认字体和大小
        $objPHPExcel->getDefaultStyle()->getFont()->setName('宋体');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(12);


        //第一行合并
        $activeSheet->mergeCells('A1:Z1');
        $activeSheet->setCellValue('A1', '学生成绩表');

        //
        //设置第1行的高度：
        $activeSheet->getRowDimension('1')->setRowHeight(30);




        //输出表头信息
        $c = 97;
        foreach($data[0] as $k=>$v){
            if($k == 'id'){
                continue;
            }
            $activeSheet->setCellValue(chr($c).'2', $k);
            $c ++;
        }
        $activeSheet->setCellValue(chr($c).'2', '总分');
        $activeSheet->setCellValue(chr($c+1).'2', '平均分');
        //设置 单元格 加粗 居中
        $styleArray = array(
          'font' => array(
            'bold' => true,
            'size'=>12,
            'color'=>array(
              'argb' => '00000000',
            ),
          ),
          'alignment' => array(
            'horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            //'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
          ),
        );
        // 将A2单元格设置为加粗，居中
        $activeSheet->getStyle('A2:'.chr($c+1)."2")->applyFromArray($styleArray);


        $i = 3;
        //循环遍历数据
        foreach($data as $value){

            $activeSheet->setCellValue("A".$i, $value['name']);
            $activeSheet->setCellValue("B".$i, $value['math']);
            $activeSheet->setCellValue("C".$i, $value['chinese']);
            $activeSheet->setCellValue("D".$i, $value['english']);
            //总分
            $activeSheet->setCellValue("E".$i, $value['english']+$value['math']+$value['chinese']);
            //平均分
            $activeSheet->setCellValue("F".$i, ($value['english']+$value['math']+$value['chinese'])/3);

            $i ++;
        }


        //设置单元格格式（数字格式）：
        $activeSheet->getStyle('E3:F'.$i)->getNumberFormat()->setFormatCode('0.00');



        //定义文件名
        $filename = '成绩信息.xls';
        //输出excel表
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        // 从浏览器直接输出$filename
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header("Content-Disposition:attachment;filename=".$filename);
        header("Content-Transfer-Encoding:binary");
        $objWriter->save("php://output");
    }


    /**对excel里的日期进行格式转化*/
    private function GetData($val){
        $jd = GregorianToJD(1, 1, 1970);
        $gregorian = JDToGregorian($jd+intval($val)-25569);
        return $gregorian;/**显示格式为 “月/日/年” */
    }

    //读取excel
    public function readExcel(){
        require "./Application/Common/Vendor/PHPExcel_1.8.0/Classes/PHPExcel.php";

        $filePath = '../test.xls';

        if(!file_exists($filePath)){
            echo $filePath.",no exist!";
            exit;
        }

        $PHPExcel = new \PHPExcel();



        /**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
        $PHPReader = new \PHPExcel_Reader_Excel2007();

        if(!$PHPReader->canRead($filePath)){
            $PHPReader = new \PHPExcel_Reader_Excel5();

            if(!$PHPReader->canRead($filePath)){
                echo 'no Excel';
                return ;
            }
        }


        $PHPExcel = $PHPReader->load($filePath);


        /**读取excel文件中的第一个工作表*/
        $currentSheet = $PHPExcel->getSheet(0);
        /**取得最大的列号*/
        $allColumn = $currentSheet->getHighestColumn();
        /**取得一共有多少行*/
        $allRow = $currentSheet->getHighestRow();




        //输出信息
        echo "<meta charset=utf8>";
        echo "该表格中共有{$allRow}行，最大列号：{$allColumn}<hr>";


        /**从第二行开始输出，因为excel表中第一行为列名*/
        for($currentRow = 2;$currentRow <= $allRow;$currentRow++){
            /**从第A列开始输出*/
            for($currentColumn= 'A';$currentColumn<= $allColumn; $currentColumn++){
                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65,$currentRow)->getValue();/**ord()将字符转为十进制数*/

                if($currentColumn == 'A') {
                    echo $this->GetData($val)." ";
                //}else{
                }
                echo $val." ";
                //}
            }
            echo "</br>";
        }
        echo "<hr>";

    }
}
