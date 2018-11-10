<html>
<head>
  <!-- Load seo -->
  <?php $this->load->view('seo'); ?>

  <!-- Load header custom -->
  <?php $this->load->view('site_page/themes/basic_template/components/header'); ?>
</head>

<body>

<div id="cv" class="border content">
    <?php $this->load->view('site_page/themes/basic_template/components/person_info',$data_subview); ?>

    <hr>
    <div align="right">
|<a href="#rech">Research</a>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
|<a href="http://cit.ctu.edu.vn/~dtnghi/v4miner">Software</a>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
|<a href="http://cit.ctu.edu.vn/~dtnghi/images.html">Image</a>|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
|<a href="http://cit.ctu.edu.vn/~dtnghi/course.html">Course.VN</a>|
	</div>
    <hr>

	 <!-- education -->
    <div class="con">
    	<div class="tb_title">Education</div>
    	<div class="tb"><span class="year">Dec 2004</span>
    		<ul class="list">
    			<li><span class="title">Ph.D. in computer science on</span>
    			    <div class="info"><br>Visualization and Support Vector Machine in Data Mining<br>LINA, Nantes Laboratory for Computer Science Nantes University, France<br>Thesis advisors: Prof. Henri Briand, Dr. François Poulet</div>
    			</li>
    		</ul>
    	</div>
    	<div class="tb"><span class="year">Jul 2002</span>
    		<ul class="list">
    			<li><span class="title">DEA in computer science</span>
    				 <div class="info"><br>Visualization and Support Vector Machine in Data Mining<br>LINA, Nantes Laboratory for Computer Science Nantes University, France<br>Advisor: Dr. François Poulet</div>
    			</li>
    		</ul>
    	</div>
    	<div class="tb"><span class="year">Aug 2001</span>
    		<ul class="list">
    			<li><span class="title">Master in computer science</span>
    				 <div class="info"><br>IFI, Francophone Institute for Computer Science Hanoi, Vietnam<br>Advisor: Dr. Philippe Massonet</div>
    			</li>
    		</ul>
    	</div>
    	<div class="tb"><span class="year">Jul 1996</span>
    		<ul class="list">
    			<li><span class="title">Engineering diploma in computer science</span>
					 <div class="info"><br>College of Information Technology Cantho University, Vietnam<br>Advisor: Prof. Hoang Kiem</div>
				</li>
			</ul>
		</div>
	</div>

	<!-- distinction -->
	<div class="con"><div class="tb_title">Distinction</div>
		<div class="tb"><span class="year">Nov. 2015</span>
			<ul class="list">
				<li><span class="title">Qualification for Associate Professor (A/Prof.)</span>
					 <div class="info"><br>Informatics</div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year">Jan. 2010</span>
			<ul class="list">
				<li><span class="title">Qualification for Maître de Conférences (MCF-27)</span>
					 <div class="info"><br>Informatics</div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year">Jan. 2005</span>
			<ul class="list">
				<li><span class="title">Qualification for Maître de Conférences (MCF-27)</span>
					 <div class="info"><br>Informatics</div>
				</li>
			</ul>
		</div>
	</div>

	<!-- research interests -->
	<a name="rech">
	<div class="con"><div class="tb_title">Research interests</div>
		<div class="tb"><span class="year">2001 - present</span>
			<ul class="list">
				<li><span class="title">Data mining and Knowledge discovery in databases</span>
					 <div class="info">
					   <br>
					 	Data mining with SVM and Kernel-based methods, Ensemble methods, Decision tree <br><br>
					 	Information visualization in knowledge discovery in databases, Visual data mining <br><br>
						Mining complex data: very-high-dimensional, large scale, imbalanced datasets
					 </div>
				</li>
			</ul>
		</div>
	</div>

	<!-- experiences -->
	<div class="con"><div class="tb_title">Experience</div>
		<div class="tb"><span class="year">2012 - 2013</span>
			<ul class="list">
				<li><span class="title">Visiting scientist</span>
					 <div class="info"><br>DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, A/Prof. Sorin Moga, Telecom-Bretagne, France.<br>Automatic Configuration of Enterprise Resource Planning</div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year">2008 - 2010</span>
			<ul class="list">
				<li><span class="title">Visiting postdoc</span>
					 <div class="info"><br>DECIDE, URM 6285 Lab-STICC, with Prof. Philippe Lenca, Telecom-Bretagne, France.<br>Decision Trees for Classifying Very-High-Demensional and Imbalanced Data</div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year">2006 - 2008</span>
			<ul class="list">
				<li><span class="title">Visiting postdoc</span>
					 <div class="info"><br>AVIZ, INRIA Saclay, with Prof. Jean-Daniel Fekete, France.<br>SEVEN: Visual Analytical Project</div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year">2005 - present</span>
			<ul class="list">
				<li><span class="title">Lecturer</span>
					 <div class="info"><br>Computer Networks Department, Can Tho University, Vietnam.<br>Teaching: Data Mining, Machine Learning, Web Programming, Linux/Open-source Softwares, Parallel Programming</div>
				</li>
			</ul>
		</div>
	</div>

	<!-- publications -->
	<div class="con"><div class="tb_title">Publications</div>
		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Journal, book chapter</span>
					 <div class="info">
						<br>
					 	T-N. Do, F. Poulet.
					 	 Latent-lSVM classification of very high-dimensional and large scale multi-class datasets.
					 	(to appear) in <i> Concurrency and Computation: Practice and Experience</i>, Wiley, 2018. <img alt="" src="images/new.gif"><br><br>

						P-H. Vo, T-S. Nguyen, V-T. Huynh and T-N. Do.
						A Novel Reversible Data Hiding Scheme with  Two-Dimensional Histogram Shifting Mechanism.
						(to appear) in <i>International Journal of Multimedia Tools and Applications</i>, Springer, 2018. <img alt="" src="images/new.gif"><br><br>

					 	T-N. Do, F. Poulet.
					 	Parallel learning of local SVM algorithms for classifying large datasets.
					 	in <i>The LNCS Journal Transactions on Large-Scale Data- and Knowledge-Centered Systems</i>, Vol.31:67-93, Springer, 2017. <br><br>

					 	T-N. Do, P. Lenca, S. Lallich.
					 	Classifying Many-Class High Dimensional Fingerprint Datasets Using Random Forest of Oblique Decision Trees.
					 	in <i>Vietnam Journal of Computer Science</i>, Vol.2(1): 3-12, Springer, 2015. <br><br>

						T-N. Do, N-K. Pham.
						Handwritten Digit Recognition Using GIST Descriptors and Random Oblique Decision Trees.
						in <i>Advances in Intelligent Systems and Computing</i>, Vol.341: 1-15, Springer, 2015. <br><br>

						T-N. Doan, T-N. Do, F. Poulet.
						Large Scale Classifiers for Visual Classification Tasks.
						in <i>International Journal of Multimedia Tools and Applications</i>, Vol.74(4): 1199-1224, Springer, 2015. <br><br>

						T-N. Do, H-A. Le-Thi.
						Massive Classification with Support Vector Machines.
						in <i>Transactions on Computational Collective Intelligence XVIII</i>, Springer Berlin Heidelberg, 2015, pp. 147-165. <br><br>

						T-N. Doan, T-N. Do, F. Poulet.
						Classification d'images à grande échelle avec des SVMs.
						in <i>Revue Traitement du Signal</i>, Vol.31(1-2): 39-56, LAVOISIER, 2014. <br><br>

						T-N. Do.
						Parallel Multiclass Stochastic Gradient Descent Algorithms for Classifying Million Images with Very-High-Dimensional Signatures into Thousands Classes.
						in <i>Vietnam Journal of Computer Science</i>, Vol.1(2): 107-115, Springer, 2014. <br><br>

						T-N. Doan, T-N. Do, F. Poulet.
						Parallel Incremental Power Mean SVM for the Classification of Large Scale Image Datasets.
						in <i>International Journal of Multimedia Information Retrieval</i>, Vol.3(2): 89-96, Springer, 2014. <br><br>

						T-N. Do, S. Lallich, N-K. Pham and P. Lenca.
						Classifying very-high-dimensional data with random forests of oblique decision trees.
						in <i>Advances in Knowledge Discovery and Management</i>, Studies in Computational Intelligence Vol.292: 39-55, Springer-Verlag, 2010. <br><br>

						T-N. Do, V-H. Nguyen, F. Poulet.
						GPU-based parallel SVM algorithm.
						in <i>Journal of Frontiers of Computer Science and Technology</i>, Vol.3(4): 368-377, 2009. <br><br>

						T-N. Do and F. Poulet.
						Interval Data Mining with Kernel-based Algorithms and Visualization.
						Chapter 5 in <i>Mining Complex Data for Knowledge Discovery: Advances and Applications</i>, Studies in Computational Intelligence Vol.165: 75-91, Springer-Verlag, 2009. <br><br>

						F. Poulet and T-N. Do.
						Interactive Decision Tree Construction for Interval and Taxonomical data.
						in <i>Visual Data Mining: Theory, Techniques and Tools for Visual Analytics</i>, Lecture Notes in Computer Science Vol.4404: 123-135, Springer-Verlag, 2008. <br><br>

						T-N. Do et J-D. Fekete.
						V4Miner pour la fouille de données.
						in <i>Review of Artificial Intelligence</i>, Vol.22/3-4: 503-517, 2008. <br><br>

						N-K. Pham, T-N. Do, F. Poulet et A. Morin.
						Tree-view pour l'exploration interactive des arbres de décision.
						in <i>Review of Artificial Intelligence</i>, Vol.22/3-4: 473-487, 2008. <br><br>

						T-N. Do and F. Poulet. Vis-SVM : approche coopérative en fouille de données.
						in <i>Numéro Spécial Visualisation et Extraction de Connaissances</i>, Revue des Nouvelles Technologies de l'Information – Série Extraction et Gestion des Connaissances RNTI-E-7: 49-74, 2006. <br><br>

						F. Poulet and T-N. Do.
						Mining Very Large Datasets with Support Vector Machine Algorithms.
						in <i>Enterprise Information Systems V</i>, Kluwer Academic Publishers, 2004, pp. 177-184.
					 </div>
				</li>
			</ul>
		</div>

		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Edited book</span>
					 <div class="info">
					<br>
						F. Poulet, B. LeGrand, T-N. Do and M-A. Aufaure.
						Acte de l'Atelier Visualisation et extraction de connaissances.
						9èmes Journées d'Extraction et Gestion des Connaissances 2009. <br><br>

						F. Poulet, B. LeGrand, T-N. Do.
						Acte de l'Atelier Visualisation et extraction de connaissances.
						8èmes Journées d'Extraction et Gestion des Connaissances 2008.
					</div>
				</li>
			</ul>
		</div>

		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Conference, workshop</span>
					 <div class="info">
					   <br>
						T-N. Do and M-T. Tran-Nguyen.
						Automatic hyper-parameters tuning for local support vector machines. (to appear)
						in proc. of Intl Conf. on Future Data and Security Engineering 2018 (FDSE 2018), Springer, 2018. <img alt="" src="images/new.gif"><br><br>


						P-H. Huynh, V-H. Nguyen, and T-N. Do.
						A coupling support vector machines with the feature learning of deep convolutional neural networks for classifying microarray gene expression data.
						in proc. of Modern Approaches for Intelligent Information and Database Systems, Springer, 2018, pp. 233-243. <img alt="" src="images/new.gif"><br><br>


						T-T. Ma, S. Benferhat, Z. Bouraoui, K. Tabia, T-N. Do and H-H. Nguyen.
						An Ontology-based Modelling of Vietnamese Traditional Dances.  (to appear)
						in proc. of The 30th Intl Conf. on Software Engineering & Knowledge Engineering, 2018. <img alt="" src="images/new.gif"><br><br>

						M-T. Tran-Nguyen, L-D. Bui, Y-G. Kim and T-N. Do.
						Decision tree using local support vector regression for large datasets.
						in proc. of Asian Conf. on Intelligent Information and Database Systems 2018 (ACIIDS 2018), Springer, 2018, pp. 255-265. <img alt="" src="images/new.gif"><br><br>

						P-H. Vo, T-S. Nguyen, V-T. Huynh and T-N. Do.
						A robust hybrid watermarking scheme based on DCT and SVD for copyright protection of stereo images.
						in proc. of NAFOSTED Conf. on Information and Computer Science (NICS 2017), 2017, pp. 331-335. <br><br>

						T-N. Do, N-K. Pham, T-P. Pham, M-T. Tran-Nguyen and H-H. Nguyen.
						Parallel Bag-SVM-SGD for classifying very high-dimensional and large-scale multi-class datasets.
						in proc. of Siggraph Asia workshop-D2AT, ACM, 2017. <br><br>

						L-D. Bui, M-T. Tran-Nguyen, Y-G. Kim and T-N. Do.
						Parallel algorithm of local support vector regression for large datasets.
						in proc. of Intl Conf. on Future Data and Security Engineering 2017 (FDSE 2017), Springer, 2017, pp. 139-153. <br><br>

						T-N. Do, M-T. Tran-Nguyen.
						Incremental parallel support vector machines for classifying large-scale multi-class image datasets.
						in proc. of Intl Conf. on Future Data and Security Engineering 2016 (FDSE 2016), Springer, 2016, pp. 20-39. <br><br>

						T-N. Do, F. Poulet.
						Classifying very high-dimensional and large scale multi-class image datasets with Latent-lSVM.
						in proc. of CBDCom2016, The IEEE Intl Conf. on Cloud and Big Data Computing 2016, pp. 714-721. <br><br>

						T-N. Do, F. Poulet.
						Régression logistique pour la classification d'images à grande échelle.
						in proc. of EGC2016,  RNTI-E-30, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, 2016, pp. 309-320. <br><br>

						T-N. Do, F. Poulet.
						Random local SVMs for classifying large datasets.
						in proc. of Intl Conf. on Future Data and Security Engineering 2015 (FDSE 2015), Springer, 2015, pp. 3-15. <br><br>

						T-N. Do.
						Using local rules in random forests of decision trees.
						in proc. of Intl Conf. on Future Data and Security Engineering 2015 (FDSE 2015), Springer, 2015, pp. 32-45. <br><br>

						T-N. Do, F. Poulet.
						Parallel multiclass logistic regression for classifying large scale image datasets.
						in Advanced Computational Methods for Knowledge Engineering Studies in Computational Intelligence, Springer, 2015, pp. 255-266.  <br><br>

						T-N. Do.
						Non-linear classification of massive datasets with a parallel algorithm of local support vector machines.
						in Advanced Computational Methods for Knowledge Engineering Studies in Computational Intelligence, Springer, 2015, pp. 231-241.  <br><br>

						T-V. Le, M-T. Tran-Nguyen, N-K. Pham and T-N. Do.
						Forests of oblique decision stumps for classifying very large number of tweets.
						in proc. of Intl Conf. on Future Data and Security Engineering 2014 (FDSE 2014), Springer, 2014, pp. 16-28. <br><br>

						T-N. Do, S. Moga and P. Lenca.
						Random forest of oblique decision trees for ERP semi-automatic configuration.
						in proc. of Multiple Model Approach to Machine Learning (MMAML 2014), Springer, 2014, pp. 25-34. <br><br>

						T-N. Do and N-K. Pham.
						Handwritten Digit Recognition Using GIST Descriptors and Random Oblique Decision Trees.
						in proc. of the first NAFOSTED Conference on Information and Computer Science 2014 (NICS'14), 2014, pp. 285-296. <br><br>

						T-N. Doan, T-N. Do and F. Poulet.
						Parallel incremental SVMs for classifying a million of images with very-high-dimensional signatures into thousands of classes.
						in proc. of Intl Joint Conf. on Neural Networks 2013, IEEE, pp. 2976-2983.<br><br>

						T-N. Doan, T-N. Do and F. Poulet.
						Large Scale Visual Classification with Parallel, Imbalanced Bagging and Incremental LIBLINEAR SVM.
						in proc. of Intl Conf. on Data Mining 2013, CSREA Press, pp. 197-203. <br><br>

						T-N. Doan, T-N. Do and F. Poulet.
						Large scale visual classification with many classes.
						in proc. of Intl Conf. on Machine Learning and Data Mining, Springer-Heidelberg, 2013, pp. 629-643.<br><br>

						T-N. Doan, T-N. Do and F. Poulet.
						Large scale image classification with many Classes, multi-features and very-high-dimensional signatures.
						in Advanced Computational Methods for Knowledge Engineering Studies in Computational Intelligence Volume 479, 2013, pp. 105-116.<br><br>

						T-N. Doan, T-N. Do and F. Poulet.
						Multi-way classification for large scale visual object dataset.
						in proc. of Intl Workshop on Content-Based Multimedia Indexing, 2013, pp. 185-190.<br><br>

						T-N. Do.
						Detection of Pornographic Images Using Bag-of-Visual-Words and Arcx4 of Random Multinomial Naive Bayes.
						in <i>Journal of Science and technology, Special Issue on Theories and Application of Computer Science</i>, Vol.49(5): 13-24, 2011. <br><br>

						T-N. Nguyen, T-N. Do and L. Schmidt-Thieme.
						Learning optimal threshold on resampling data to deal with class imbalance.
						in proc. of RIVF'10, IEEE Intl Conf. on Computer Sciences: Research and Innovation - Vision for the Future, IEEE Press, 2010, pp. 71-76.<br><br>


						T-N. Do, P. Lenca and S. Lallich.
						Enhancing network intrusion classification through the Kolmogorov-Smirnov splitting criterion.
						in <i>Journal of Science and technology, Special Issue on Theories and Application of Computer Science</i>, Vol.48(4): 50-61, 2010. <br><br>

						T-N. Nguyen, T-N. Do,  L. Schmidt-Thieme.
						Learning optimal threshold for Baysian posterior probabilities to mitigate  the class imbalance problem.
						in <i>Journal of Science and technology, Special Issue on Theories and Application of Computer Science</i>, Vol.48(4): 38-49, 2010. <br><br>

						T-N. Do, S. Lallich, N-K. Pham and P. Lenca.
						Un nouvel algorithme de forêts aléatoires d'arbres obliques particulièrement adapté à la classification de données en grandes dimensions.
						in proc. of EGC2009,  RNTI-E-15, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, 2009, pp. 79-90.<br><br>

						F. Poulet, T-N. Do and V-H. Nguyen.
						SVM incrémental et parallèle sur GPU.
						in proc. of EGC2009, RNTI-E-15, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, 2009, pp. 103-114.<br><br>

						T-B. Nguyen, P. Lenca, T-N. Do and F. Poulet.
						Visualisation de réseaux d'experts.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2009, pp. 1-5. <br><br>

						T-N. Do, N-K. Pham and F. Poulet.
						Une méthode anthropocentrée pour la construction d'arbres de décision.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2009, pp. 33-43. <br><br>

						T-N. Do, V-H. Nguyen and F. Poulet.
						A Novel SVM Algorithm for Massive Classification Tasks.
						in proc. of ADMA'08, Intl Conf. on Advanced Data Mining And Applications, Springer-Verlag, 2008, pp. 147-157.<br><br>

						T-N. Do, V-H. Nguyen and F.Poulet.
						A Fast Parallel Support Vector Machine Algorithm for Massive Classification Tasks.
						in proc. of MCO'8, Intl Conf. on Modelling, Computation and Optimization in Information Systems and Management Sciences, CCIS 14, Springer-Verlag, 2008, pp. 425-434.<br><br>

						N-K. Pham, T-N. Do, P. Lenca and S. Lallich.
						Using local node information in decision trees: coupling a local decision rule with an off-centered.
						in proc. of DMIN'08, Intl Conf. on Data Mining, CSREA Press, 2008, pp. 117-123. <br><br>

						P. Lenca, S. Lallich, T-N. Do and N-K. Pham.
						A comparison of different off-centered entropies to deal with class imbalance for decision trees.
						in proc. of PAKDD'2008, The Pacific-Asia Conference on Knowledge Discovery and Data Mining, Springer-Verlag, 2008, pp. 634-643. <br><br>

						T-N. Do and V-H. Nguyen.
						A Novel Speed-up SVM Algorithm for Massive Classification Tasks.
						in proc. of RIVF'08, IEEE Intl Conf. on Computer Sciences: Research and Innovation - Vision for the Future, IEEE Press, 2008, pp. 215-220. <br><br>

						N. Elmqvist, T-N. Do, H. Goodell, N. Henry and J-D. Fekete.
						ZAME: Interactive Large-Scale Graph Visualization.
						in proc. of the IEEE Pacific Visualization Symposium 2008, IEEE Press, 2008, pp. 215-222. <br><br>

						T-N. Do, J-D. Fekete and F. Poulet.
						Algorithmes rapides de boosting de SVM.
						in proc. of EGC2008, RNTI-E-11, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, 2008, pp. 297-308.<br><br>

						T-N. Do, N-K. Pham, S. Lallich and P. Lenca.
						Expérimentation de l’entropie décentrée pour le traitement des classes déséquilibrées en induction par arbres.
						in proc. of Atelier Qualité des données et des connaissances, EGC2008, pp. 39-49. <br><br>

						T-N. Do and J-D. Fekete.
						Fouille de données à l'aide d'un environnement de programmation visuelle.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2008, pp. 81-92. <br><br>

						T-N. Do and J-D. Fekete.
						Large Scale Classification with Support Vector Machine Algorithms.
						in proc. of ICMLA'07, Intl Conf. on Machine Learning and Applications, IEEE Press, 2007, pp. 7-12.<br><br>

						T-N. Do, F. Poulet and J-D. Fekete.
						Massive Data Mining via Boosting of Least Squares SVM Algorithm.
						in proc. of RIVF'07, IEEE Intl Conf. on Computer Sciences: Research and Innovation - Vision for the Future, 2007, pp. 47-52. <br><br>

						T-N. Do and F. Poulet.
						Classification de grands ensembles de données avec un nouvel algorithme de SVM.
						in proc. of EGC2007, RNTI-E-9, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, Vol.2, pp. 739-750, 2007. <br><br>

						T-N. Do, N-K. Pham and F. Poulet.
						Exploration interactive de résultats d'arbre de décision.
						in proc. of EGC2007, RNTI-E-9, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, Vol.1, pp. 157-168, 2007. <br><br>

						N-K. Pham, T-N. Do, F. Poulet and A. Morin.
						Interactive Exploration of Decision Tree Results.
						in proc. of ASMDA’07, Intl Symposium on Applied Stochastic Models and Data Analysis 2007. <br><br>

						T-N. Do and H-A. Le-Thi.
						Classifying large datasets with SVM.
						in proc. of Intl Conf. on Computational Management Science 2007. <br><br>

						N-K. Pham, T-N. Do, F. Poulet and A. Morin.
						Exploration interactive des arbres de décision.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2007. <br><br>

						T-N. Do and J-D. Fekete.
						Flot visuel de données.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2007. <br><br>

						T-N. Do and F. Poulet.
						Kernel-based algorithms and visualization for interval data mining.
						in proc. of Intl Workshop on Mining Complex Data - MCD'06 - In Conjunction with IEEE ICDM'06, pp. 295-299. <br><br>

						T-N. Do and F. Poulet.
						SVM incrémental, parallèle et distribué pour le traitement de grandes quantités de données.
						in proc. of EGC2006,  RNTI-E-6, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, Vol.1, pp. 47-52, 2006. <br><br>

						T-N. Do and F. Poulet.
						Classifying one billion data with a new distributed SVM algorithm.
						in proc. of RIVF'06, IEEE Intl Conf. on Computer Science, Research, Innovation and Vision for the Future, IEEE Press, 2006, pp. 59-66. <br><br>

						N-K. Pham and T-N. Do.
						Tree-View : post-traitement interactif pour des arbres de décision.
						in proc. of Atelier Visualisation et extraction de connaissances, EGC2006, pp. 103-110.<br><br>

						T-N. Do and F. Poulet.
						SVM et visualisation pour la fouille de grands ensembles de données.
						in proc. of EGC2005, RNTI-E-3, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, Vol.2, pp. 545-556, 2005. <br><br>

						T-N. Do and F. Poulet.
						Mining Very Large datasets with SVM and Visualization.
						in proc. of ICEIS'05, Intl Conf. on Entreprise Information Systems: Artificial Intelligence and Decision Support Systems, 2005, pp. 127-141. <br><br>

						T-N. Do and F. Poulet.
						Kernel Methods and Visualization for Interval Data Mining.
						in proc. of ASMDA'05, Intl Symposium on Applied Stochastic Models and Data Analysis 2005, 2005, pp. 345-354.<br><br>

						T-N. Do and F. Poulet.
						A Simple, Fast Support Vector Machine Algorithm for Data Mining.
						in proc. of ECML/PKDD'05 Workshop on Knowledge Discovery from Data Streams, 2005, pp. 87-94.<br><br>

						T-N. Do and F. Poulet.
						Interval Data Mining with SVM and Visualization.
						in proc. of RIVF'05, Intl Conf. on Computer Science, Research, Innovation and Vision for the Future, 2005, pp. 197-203. <br><br>

						H-T Do, N-K Pham and T-N Do.
						A simple, fast support vector machine algorithm for data mining.
						in proc. of FAIR'05, National Symposium Fundamental & Applied IT Research, Vietnam, 2005, pp. 13-22. <br><br>

						T-N. Do and F. Poulet.
						Enhancing SVM with Visualization.
						in proc. of Discovery Science 2004, Springer-Verlag, 2004, pp. 183-194. <br><br>

						T-N. Do and F. Poulet.
						Fouille de grands ensembles de données avec un boosting de proximal SVM.
						in proc. of EGC2004, RNTI-E-2, Revue des Nouvelles Technologies de l'Information - Série Extraction et Gestion des Connaissances, Cépaduès Editions, Vol. 1, pp. 229-240, 2004.<br><br>

						T-N. Do and F. Poulet.
						Towards High Dimensional Data Mining with Boosting of PSVM and Visualization Tools.
						in proc. of ICEIS'04, Intl Conf. on Entreprise Information Systems: Artificial Intelligence and Decision Support Systems, Vol. 2, pp. 36-41, 2004.<br><br>

						T-N. Do and F. Poulet.
						Cooperation between Visualization Methods and SVM Algorithms for Data Mining.
						in proc. of MCO'04, Computer Sciences, Modelling, Computation and Optimization in Information Systems and Management Sciences: Data Mining Theory, Systems and Applications, Hermes Science, 2004, pp. 569-576.<br><br>

						T-N. Do and F. Poulet.
						Interprétation graphique des résultats de SVM.
						in CD-ROM of SFDS'04, XXXVIème Journées de Statistiques, Montpellier, 2004. <br><br>

						T-N. Do and F. Poulet.
						SVM incrémental pour l'analyse d'expressions de gènes.
						in proc. of RIVF2004, Rencontre de Recherche Informatique Vietnam et Francophonie, 2004, pp. 215-220.<br><br>

						T-N. Do and F. Poulet.
						Mining Very Large Datasets with Support Vector Machine Algorithms.
						in proc. of ICEIS'03, Intl Conf. on Enterprise Information Systems: Artificial Intelligence and Decision Support Systems, Vol. 2, pp. 140-147, 2003. <br><br>

						T-N. Do and F. Poulet.
						Incremental SVM and Visualization Tools for Bio-medical Data Mining.
						in proc. of ECML/PKDD'03 Workshop on Data Mining and Text Mining in Bioinformatics, Cavtat-Dubrovnik, 2003, pp. 14-19.<br><br>

						T-N. Do and F. Poulet.
						Interactive Visualization Tools for Visual Data-Mining.
						in proc. of HCP'03,  Mini-EURO Conf., Human Centered Processes, Luxembourg, 2003, pp. 299-303.<br><br>

						T-N. Do and F. Poulet.
						Fouille de textes de l'aide de proximal SVM.
						in proc. of RIVF'03, Rencontre de Recherche Informatique Vietnam et Francophonie, 2003, pp. 33-36.<br><br>

						T-N. Do and F. Poulet.
						IC-PSVM : un algorithme de SVM incrémental pour la classification de données bio-informatiques.
						in proc. of Atelier A3 : Apprentissage machine et Bioinformatique, Plateforme AFIA 2003.<br><br>

						F. Poulet and T-N. Do.
						SVM parallélisé pour classifier un milliard de données.
						in proc. of SFC'02, IXème Rencontres de la Société Francophone de Classification, 2002, pp. 301-304.

						<br><br>
						T-N. Do.
						Visualisation en extraction de connaissances à partir de données.
						in proc. of JDOC'04, Journée des Doctorants, Ecole Polytechnique de l'Université de Nantes, 2004. <br><br>

						<a href="misc.html">Miscellaneous papers</a>
					</div>
				</li>
			</ul>
		</div>


		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Technical report</span>
					 <div class="info">
					   <br>
						J-D. Fekete, N. Elmqvist, T-N. Do, H. Goodell and N. Henry.
						Navigating Wikipedia with the Zoomable Adjacency Matrix Explorer.
						INRIA Research Report, Technical Report No. RR:00141168, 2007. <br><br>

						T-N. Do and F. Poulet. La catégorisation de textes.
						Rapport de contrat Fondation Vediorbis.
						ESIEA Recherche, Laval, 2004.
					</div>
				</li>
			</ul>
		</div>


		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Thesis</span>
					 <div class="info">
					   <br>
						T-N. Do.
						Visualisation et séparateurs à vaste marge en fouille de données.
						Thèse de Doctorat de l'Université de Nantes, Décembre 2004. <br><br>

						T-N. Do.
						Visualisation et fouille de données.
						Rapport de DEA, Université de Nantes, Juillet 2002.
					</div>
				</li>
			</ul>
		</div>


	</div>

	<!-- workshop/conf -->
	<div class="con"><div class="tb_title">Professional Service</div>
		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Workshop Organization</span>
					 <div class="info">
					   <br>
					 	QIMIE 2015 is organized in association with the PAKDD 2015 conference, with Prof. P. Lenca, Prof. S. Lallich<br><br>
					 	IEEE-RIVF 2015 International Conference on Computing and Communication Technologies, Workshop chair<br><br>
					 	VisECD 2009  is organized in association with the EGC 2009 conference, with Prof. F. Poulet, Prof. B. Legrand, Prof. M-A. Aufaure<br><br>
					 	VisECD 2008  is organized in association with the EGC 2008 conference, with Prof. F. Poulet, Prof. B. Legrand
					 </div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Program committee member, reviewer</span>
					 <div class="info">
					 <br>
					 	ACML 2017, The Asian Conference on Machine Learning 2017<br>
					   <br>
					 	KDIR 2014-2017, The Intl Conf. on Knowledge Discovery and Information Retrieval<br><br>
					 	MCO/ICCSAMA 2014-2015, The Intl Conf. on Computer Science, Applied Math. and Appl.<br><br>
					 	FDSE 2014-2017, The Intl Conf. on Future Data and Security Engineering <br><br>
					 	VAST 2013, The IEEE Conf. on Visual Analytics Science and Technology<br><br>
					 	DS 2012, The Intl Conf. on Discovery Science 2012<br><br>
					 	ACIIDS 2010-2016, The Asian Conf. on Intelligent Information and Database Systems<br><br>
					  	ICTACS 2010-2011, The Intl Conf. on Theories and Applications of Computer Science <br><br>
					 	CIE39, The Intl Conf. on Computers & Industrial Engineering 2009 <br><br>
					 	DMIN 2008-2010, The Intl Conf. on Data Mining<br><br>
					 	VIEW 2006-2007, Visual Information Expert Workshop<br><br>
					 	AusDM 2004, The Australasian Data Mining Conference 2004<br><br>
					 	ASMDA 2005, the Intl Symposium on Applied Stochastic Models and Data Analysis 2005<br><br>
					 	Atelier Qualité des Données et des Connaissances 2008-2011 <br><br>
					 	Atelier Visualisation et extraction de connaissances 2005-2009<br><br>
					 	Journal of Intelligent Information Systems 2013<br><br>
					 	Journal of Experimental Algorithmics 2009<br><br>
					 	Advances in Knowledge Discovery and Management 2009<br><br>
					 	Pattern Recognition Elsevier 2008<br><br>
					 	RNTI, Revue des Nouvelles Technologies de l'Information, Cépaduès Editions, 2006-2008<br><br>
					 	MCO 2008, The Intl Conf. on Modelling, Computation and Optimization in Information Systems and Management Sciences 2008<br><br>
					 	I3, Information-Interaction–Intelligence, Cépaduès Editions, 2006<br><br>
					 	ICTFIT 2008-2012, The National conference in computer science
					 </div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Invited seminars</span>
					 <div class="info">
					   <br>
					 	FIT, University of Technology HCM, Vietnam, 03/2014 <br><br>
						LITA Metz, University of Lorraine, France, 12/2012<br><br>
						Faculty of Information Technology, Dong Thap University, Vietnam, 05/2011<br><br>
						Faculty of Information Technology, Bac Lieu University, Vietnam, 06/2011<br><br>
						An Giang University, Vietnam, 08/2010<br><br>
						Software Center of Cantho University, Vietnam, 04/2005<br><br>
						IRISA Rennes, France, 01/2005
					 </div>
				</li>
			</ul>
		</div>
		<div class="tb"><span class="year"></span>
			<ul class="list">
				<li><span class="title">Ph.D. Defense Committee</span>
					 <div class="info">
					   <br>
						Cong-Chien Ta Duy. Building information extraction system based on computing domain ontology. University of Technology HCM, Vietnam, June/2017<br>
					 <br>
						Thanh-Son Nguyen. Time series mining. University of Technology HCM, Vietnam, May/2014<br><br>
					 	Emilien Gauthier. Evaluation du risque de maladie: conception d'un processus et
					 	d'un système d'information permettant la construction d'un score de risque adapté au contexte,
					 	application au cancer du sein. University of Bretagne, France, Jan/2013
					 </div>
				</li>
			</ul>
		</div>
	</div>
</div>

<!-- Load footer -->
<?php $this->load->view('site_page/themes/basic_template/components/footer'); ?>

</body>
</html>
<!-- cool stuff -->
