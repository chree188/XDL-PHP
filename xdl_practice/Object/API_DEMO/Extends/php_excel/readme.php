<?php

		//====================================================================
		// PHPExcel
		require "./PHPExcel.php";


		//=====================================================================
		// 生成新的excel对象
		$objPHPExcel = new PHPExcel();


		//=====================================================================
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
		$activeSheet->setTitle('phpexcel测试');
		// 设置默认字体和大小
		$objPHPExcel->getDefaultStyle()->getFont()->setName('宋体');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(12);


		/**
		 * 列和行操作==========================================
		 */
		//设置第一列的宽度：
		$activeSheet->getColumnDimension('A')->setWidth(15);
		//设置第二列宽度
		$activeSheet->getColumnDimension('B')->setWidth(15);
		//设置第六行的高度：
		$activeSheet->getRowDimension('6')->setRowHeight(30);


		//合并单元格：
		$activeSheet->mergeCells('A1:C1');
		$activeSheet->mergeCells('A7:A10');






		/**
			* 单元格 操作=====================================
		*/

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
		    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
		    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
		  ),
		);
		// 将A2单元格设置为加粗，居中
		$activeSheet->getStyle('A2')->applyFromArray($styleArray);




		//给单元格 写入内容
		$activeSheet->setCellValue('C4', 'Hello Baby');
		$activeSheet->setCellValue('A6', '翠翠');
		$activeSheet->setCellValue('D7', 'hello');
		$activeSheet->setCellValue('D8', 'hello');




		//设置单元格样式 水平/垂直 居中
		$activeSheet->getStyle('A6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
  		$activeSheet->getStyle('A6')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);



  		//设置单元格样式（黑色字体）：
		$activeSheet->getStyle('D8')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_BLACK); // 黑色


		//设置单元格格式（背景）：
		$activeSheet->getStyle('D8')->getFill()->getStartColor()->setARGB('00ff99cc'); // 将背景设置为浅粉色


		//设置单元格格式（数字格式）：
		$activeSheet->getStyle('D9')->getNumberFormat()->setFormatCode('0.000');



		// 将数据中心图片放在J1单元格内
		$objDrawing = new PHPExcel_Worksheet_Drawing();
		$objDrawing->setName('Logo');
		$objDrawing->setDescription('Logo');
		$objDrawing->setPath('test.jpg');
		//$objDrawing->setWidth(400);
		//$objDrawing->setHeight(123);
		$objDrawing->setCoordinates('D10');
		$objDrawing->setWorksheet($activeSheet);




		//在单元格中设置 超链接
		$activeSheet->setCellValue('E3', 'lamp兄弟连');
		$activeSheet->getCell('E3')->getHyperlink()->setUrl('http://www.lampbrother.net');
		//设置单元格样式（红色字体）：
		$activeSheet->getStyle('E3')->getFont()->getColor()->setARGB(PHPExcel_Style_Color::COLOR_RED); // 黑色



		//设置单元格 边框
		$styleThinBlackBorderOutline = array(
		    'borders' => array (
		       'outline' => array (
		          'style' => PHPExcel_Style_Border::BORDER_THIN,  //设置border样式
		          //'style' => PHPExcel_Style_Border::BORDER_THICK, 另一种样式
		          'color' => array ('argb' => 'FF000000'),     //设置border颜色
		      ),
		   ),
		);
		$activeSheet->getStyle( 'A4:E10')->applyFromArray($styleThinBlackBorderOutline);






		//======================================================================
		//添加一个新的worksheet
	    $objPHPExcel->createSheet();
	    $objActSheet = $objPHPExcel->getSheet(1);
	    $objActSheet->setTitle('新表');

	    $objActSheet->setCellValue('A1', '我是新表Hello Baby');




	    //输出 excel=============================================================
	    $filename='test.xls';
		// 如果需要输出EXCEL格式
		//if($m_exportType=="excel"){
		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
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
		//}









		//输出pdf==================================================================
		// 如果需要输出PDF格式
		if($m_exportType=="pdf"){
		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
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
 ?>
