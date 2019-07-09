package com.ngthuc.spsimct594.entity;

import javax.persistence.*;

@Entity
@Table(name = "info")
public class Info {

	@Id
	@GeneratedValue(strategy = GenerationType.IDENTITY)
	@Column(name = "id")
	private Long id;

	@ManyToOne
	@JoinColumn(name = "ownedOf")
	private Account account;

	@ManyToOne
	@JoinColumn(name = "ownedBy")
	private Organisation organisation;

	@ManyToOne
	@JoinColumn(name = "cateId")
	private Category category;

	@Column(name = "infoDate")
	private String infoDate;

	@Column(name = "title")
	private String title;

	@Column(name = "content", columnDefinition = "TEXT")
	private String content;

	@ManyToOne
	@JoinColumn(name = "policy")
	private Policy policy;

	@Column(name = "type")
	private String type;

	@Column(name = "isPublish")
	private boolean isPublish;

	public Info() {}

	public Long getId() {
		return id;
	}

	public void setId(Long id) {
		this.id = id;
	}

	public Account getAccount() {
		return account;
	}

	public void setAccount(Account account) {
		this.account = account;
	}

	public Organisation getOrganisation() {
		return organisation;
	}

	public void setOrganisation(Organisation organisation) {
		this.organisation = organisation;
	}

	public Category getCategory() {
		return category;
	}

	public void setCategory(Category category) {
		this.category = category;
	}

	public String getInfoDate() {
		return infoDate;
	}

	public void setInfoDate(String infoDate) {
		this.infoDate = infoDate;
	}

	public String getTitle() {
		return title;
	}

	public void setTitle(String title) {
		this.title = title;
	}

	public String getContent() {
		return content;
	}

	public void setContent(String content) {
		this.content = content;
	}

	public Policy getPolicy() {
		return policy;
	}

	public void setPolicy(Policy policy) {
		this.policy = policy;
	}

	public String getType() {
		return type;
	}

	public void setType(String type) {
		this.type = type;
	}

	public boolean isPublish() {
		return isPublish;
	}

	public void setPublish(boolean publish) {
		isPublish = publish;
	}
}
