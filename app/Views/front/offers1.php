<div class="col-lg-12">
					<!-- Offers Grid -->
					<div class="offers_grid">
						<!-- Loop data hotels -->
						<?php foreach ($hotels as $hotel): ?>
						<div class="offers_item rating_4 mb-4">
							<div class="row">
								<div class="col-lg-1 temp_col"></div>
								<div class="col-lg-3 col-1680-4">
									<div class="offers_image_container">
										<!-- Image -->
										<div class="offers_image_background" style="background-image:url('<?= base_url('uploads/hotels/' . $hotel['image_url']) ?>')"></div>
										<div class="offer_name">
											<a href="#"><?= $hotel['name'] ?></a>
										</div>
									</div>
								</div>
								<div class="col-lg-8">
									<div class="offers_content">
										<div class="offers_price">Rp. <?= number_format($hotel['price_per_night'], 0, ',', '.') ?><span>per night</span></div>
										<p class="offers_text"><?= $hotel['description'] ?></p>
										<div class="offers_icon_black">
											<ul class="offers_icons_lists">
												<?php 
												// Amenities (Jika Anda memiliki amenities di tabel hotels)
												$amenities = explode(',', $hotel['amenities']);
												?>
												<?php foreach ($amenities as $amenity): ?>
												<li class="offers_icons_items">
													<i class="<?= trim($amenity) ?>" aria-hidden="true"></i>
												</li>
												<?php endforeach; ?>
											</ul>
										</div>
										<div class="button book_button"><a href="#">Book<span></span><span></span><span></span></a></div>
										<div class="offer_reviews">
											<div class="offer_reviews_content">
												<div class="offer_reviews_title">
													<?php 
													// Menentukan label berdasarkan rating
													if ($hotel['rating'] == 5) {
														echo 'Excellent';
													} elseif ($hotel['rating'] >= 4) {
														echo 'Very Good';
													} elseif ($hotel['rating'] >= 3) {
														echo 'Good';
													} elseif ($hotel['rating'] >= 2) {
														echo 'Fair';
													} else {
														echo 'Poor';
													}
													?>
												</div>
											</div>
											<div class="offer_reviews_rating text-center">
												<?= number_format($hotel['rating'], 1, '.', '') ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>